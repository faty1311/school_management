<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;


class UserController extends AbstractController
{
    /**
     * @Route("admin/user", name="user_list")
     */
    public function list(){
        $user = $this->getDoctrine()
        ->getRepository(User::class)
        ->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $user,
        ]);

    } 

    /**
     * @Route("admin/user/add", name="user_add")
     */
    public function new(Request $request)
    {
        
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user = $form->getData();
    
           
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
    
            $this->addFlash('success', "L'utilisateur a bien été ajouté !");

            return $this->redirectToRoute('user_list');
            
            
        }

        return $this->render('user/form.html.twig', [
            'form' => $form->createView(),
            'editMode' => $user->getId() !== null
        ]);
      
       
    }


    /**
     * @Route("admin/user/edit/{id}", name="user_edit")
     */
    public function update($id, Request $request)
    {
        
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);

        $form = $this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
           $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('primary', "L'utilisateur a bien été modifié !");
    
            return $this->redirectToRoute('user_list');
        } 

       return $this->render('user/form.html.twig', [
        'form' => $form->createView(),
        'editMode' => $user->getId() !== null
    ]);
    
    }


        /**
     * @Route("admin/user/remove/{id}", name="user_remove")
     */
    public function remove($id, Request $request)
    {

      
        
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($user);
    

            $entityManager->flush();

            $this->addFlash('danger', "L'utilisateur a bien été supprimé !");

            return $this->redirectToRoute('user_list');
           

    
    }

   
}
