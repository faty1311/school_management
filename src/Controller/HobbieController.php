<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HobbieController extends AbstractController
{
    /**
     * @Route("/hobbie", name="hobbie")
     */
    public function index()
    {
        return $this->render('hobbie/index.html.twig', [
            'controller_name' => 'HobbieController',
        ]);
    }
}
