<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Users;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register", methods={"POST"})
     */
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new Users();

        $user->setName($request->request->get('_name'));
        $user->setLastName($request->request->get('_last_name'));
        $user->setUsername($request->request->get('_username'));
        $user->setEmail($request->request->get('_email'));
        $user->setPassword($request->request->get('_password'));

        $entityManager->persist($user);
        $entityManager->flush();;


        return new Response('User created successfully');
    }
}

