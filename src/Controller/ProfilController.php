<?php

namespace App\Controller;

use App\Entity\Exam;
use App\Entity\Lessons;
use App\Entity\User;
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
            'profile' => $this->getDoctrine()->getRepository(User::class)->find($id),
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

    /**
     * @Route("/preparation", name="preparation")
     */
    public function MaPreparation()
    {


        return $this->render('profil/prepar.html.twig', [
            'prepar' => $this->getDoctrine()->getRepository(Lessons::class)->findPrepar()

        ]);
    }
}
