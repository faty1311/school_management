<?php

namespace App\Controller;

use App\Entity\Exam;
use App\Entity\Profil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil{id}", name="profil")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($id)
    {
        return $this->render('profil/Mon_Espace.html.twig', [
            'profile' => $this->getDoctrine()->getRepository(Profil::class)->find($id),
        ]);
    }

    /**
     * @Route("/calendrier", name="calendrier")
     */
    public function calendrier()
    {
        return $this->render('profil/calendrier.html.twig');
    }

    /**
     * @Route("/note", name="note")
     */
    public function Mon_Emploi()
    {


        return $this->render('profil/emploie.html.twig', [
            'exam' => $this->getDoctrine()->getRepository(Exam::class)->findResult()

        ]);
    }
}
