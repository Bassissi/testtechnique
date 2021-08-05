<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AddArticlesController extends AbstractController
{
    /**
     * @Route("/add/articles", name="add_articles")
     * // 1- Prendre cents article "fausses données" de L'api JSONPlaceholder
     * // en utilisant Get. 
     * // 2- Convertir les objets JSON à l'array php.
     * // 3- Insérer cet array qui contient cent articles dans la base de données
     * //    en utilisant Manager
     * // 4- Afficher un message qui indique qu'on a bien ajouté cent articles.
     * //    
     *  
     */
    public function add(): Response
    {
       
       /* Prendre cents article "fausses données" de L'api JSONPlaceholder
          en utilisant Get.
       */
        
        $json = file_get_contents('https://jsonplaceholder.typicode.com/posts');

        // Converts it into a PHP 
        $data = json_decode($json,true);

        // Insérer cet array qui contient cent articles dans la base de données
        // en utilisant Manager
        foreach ($data as $key => $value) {
               $manager =$this->getDoctrine()->getManager(); 
               $article=new Article; 
               $article->setTitle($value['title'])->setBody($value['body']); 
               $manager->persist($article); 
             
        }
        $manager->flush(); 
        
        // afficher un message qui indique qu'on a bien ajouté cents articles et 
        // un button pour aller voir les article
        return $this->render('add_article/add.html.twig', [
            
        ]);

    }
}
