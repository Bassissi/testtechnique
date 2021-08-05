<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowArticleController extends AbstractController
{
    /**
     * @Route("/show/article/{id}", name="show_article")
     * // Récupérer l'article par son id gràce à  Repository 
     * // en utilisant la mèthode findOneById
     */
    
    public function show($id): Response
    {

        $repo = $this->getDoctrine()->getRepository(Article::class); 
       // je récupère l'article par son id 
        $article=$repo->findOneById($id); 
        
        return $this->render('show_article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
