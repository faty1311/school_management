<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    //     $form = $this->createForm(UserType::class, $user);
        
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
            
    //        $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->flush();
    
           return $this->redirectToRoute('user_list');
    //     } 

    //    return $this->render('user/form.html.twig', [
    //     'form' => $form->createView(),
    //     'editMode' => $user->getId() !== null
    //    ]);
    
    }

   
}
