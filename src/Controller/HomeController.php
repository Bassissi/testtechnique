<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * // dans ce controleur  j'affiche justement un navebar qui contient un lier vers les 
     * // articles. 
     * // et au-dessous de ce navbar j'affiche un message d'accueil 
     * //et un botton qui nous permet de Récupérer des articles de l'api JSONPlaceholder
     * // et les insérer dans la base de données. 
     */
    public function index(): Response    
    {
 
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Test Technique',
        ]);
    }

}
