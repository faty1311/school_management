<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BackofficeController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        if(!$this->isGranted("ROLE_ADMIN"))
        {
            return $this->redirectToRoute('blog');
        }

        return $this->render('backoffice/index.html.twig', [
            'controller_name' => 'BackofficeController',
        ]);
    }
}
