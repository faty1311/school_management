<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home()
    {

        return $this->render('blog/home.html.twig', [
            'title' => 'Bienvenue sur la page d\'acceuil'
        ]);
    }
    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentation()
    {

        return $this->render('blog/presentation.html.twig', [
            'title' => 'Bienvenue sur le page de presentation'
        ]);
    }

    /**
     * @Route("/reglement", name="reglement")
     */
    public function reglement()
    {

        return $this->render('blog/reglement.html.twig', [
            'title' => 'Bienvenue sur le page de reglement'
        ]);
    }


    /**
     * @Route("/ecole", name="ecole")
     */
    public function ecole()
    {

        return $this->render('blog/ecole.html.twig', [
            'title' => 'Bienvenue sur le page de l\'ecole'
        ]);
    }
}
