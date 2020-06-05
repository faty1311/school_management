<?php

namespace App\Controller;

use App\Repository\SectorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SectorController extends AbstractController
{
    /**
     * @Route("/sector", name="sector")
     */
    public function index(SectorRepository $srepo)
    {
        $sectors = $srepo->findAll();

        return $this->render('sector/index.html.twig', [
            'sectors' => $sectors,
        ]);
    }
}
