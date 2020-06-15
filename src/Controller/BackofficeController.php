<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Repository\SubjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BackofficeController extends AbstractController
{
    /**
     * @Route("/backoffice", name="backoffice")
     */
    public function index()
    {
        return $this->render('backoffice/index.html.twig', [
            'controller_name' => 'BackofficeController',
        ]);
    }
    /**
     * @Route("/backPlanning", name="backPlanning")
     */
    public function backPlanning()
    {
        return $this->render('backoffice/backPlanning.html.twig', [
            'controller_name' => 'BackofficeController',
        ]);
    }
    /**
     * @Route("/backSubject", name="backSubject")
     */
    public function backSubject(SubjectRepository $repo,Request $request,EntityManagerInterface $manager)
    {
        $repo= $this->getDoctrine()->getRepository(Subject::class);
        $subject= $repo->findAll();

       
        dump($subject);
        dump($request);

        if($request->request->count() >0)
        {
            $subject= new Subject;
            $subject->setName($request->request->get('subject'))
                    ->setCoefficient($request->request->get('coefficient'));

            $manager->persist($subject);
            $manager->flush();

            return $this->redirectToRoute('backSubject');

        }

        return $this->render('backoffice/backSubject.html.twig', [
            'controller_name' => 'BackofficeController',
            'subject' => $subject,
        ]);

    }

    /**
     * @Route("/backNews", name="backNews")
     */
    public function backNews()
    {
        return $this->render('backoffice/backNews.html.twig', [
            'controller_name' => 'BackofficeController',
        ]);
    }


}
