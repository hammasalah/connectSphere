<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user_index")
     */
    public function index(): Response
    {
        // Your logic here, for example fetching users from the database

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/user/{id}", name="user_show")
     */
    public function show(int $id): Response
    {
        // Your logic here, for example fetching a single user by id

        return $this->render('user/show.html.twig', [
            'controller_name' => 'UserController',
            'user_id' => $id,
        ]);
    }
}