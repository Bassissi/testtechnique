<?php

namespace App\Controller;

use App\Entity\Article;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchArticlesController extends AbstractController
{
    /**
     * @Route("/search/articles", name="search_articles")
     * // Récupérer les articles de BDD grâce à Repository en utilisant 
     * // la méthode findAll
     * // Si BDD est vide J'affiche un message et un button  
     * // pour ajouter 100 articles de l'api JSONPlaceholder vers BDD
     * // Si on a des articles je les affiche.
     * 
     * 
     * 
     */
    public function search(Request $request, PaginatorInterface $paginator): Response
    {
        $donnees=0; 
        // Récupérer les articles 
        $repo = $this->getDoctrine()->getRepository(Article::class); 
        $articles= $repo->findAll(); 
      
        // s'il y a des articles je fais la pagination  
        if(empty($articles)== false)
        {

            $donnees =$articles; 
           
            $articles = $paginator->paginate(
                $donnees, // Requête contenant les données à paginer (ici nos articles)
                $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
                10 // Nombre de résultats par page
            );

        }


       
        return $this->render('search_articles/search.html.twig', [
            'articles' => $articles,'donnees'=>$donnees
        ]);
    }
}
