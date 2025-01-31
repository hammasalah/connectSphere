<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Users;
class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login" , methods={"POST"})
     */
    public function login(Request $request , EntityManagerInterface $entityManager): Response
    {

        // tekhdh email and password from form 
        $email=$request->request->get('_email');
        $password=$request->request->get('_password');


        // check the email and password 

        $user = $entityManager->getRepository(Users::class)->findOneByEmail($email);

        // navigate to feed if successful 
       if($user!==null)
    {       $passwd=$user->getPassword();
        if($passwd==$password)
        {
           
        $events = [
            [
                'id' => 1,
                'title' => 'Sea Food Fest',
                'date' => new \DateTime('2025-02-15'),
                'description' => 'Experience diverse cuisines at the annual street food festival.',
                'image' => 'images/1.jpg',
                'latitude' => 35.7584,  // Paris coordinates for example
                'longitude' => 10.8945
            ],
            [
                'id' => 2,
                'title' => 'Jazz Night',
                'date' => new \DateTime('2025-02-20'),
                'description' => 'Enjoy a night of smooth jazz with local artists.',
                'image' => 'images/2.jpg',
                'latitude' => 35.7634,
                'longitude' => 10.8548
            ],
            [
                'id' => 3,
                'title' => 'Art Exhibition',
                'date' => new \DateTime('2025-02-25'),
                'description' => 'Discover stunning artworks by local artists at the gallery.',
                'image' => 'images/3.jpg',
                'latitude' => 35.7661,
                'longitude' => 10.8125
            ],
            [
                'id' => 4,
                'title' => 'Yoga in Park',
                'date' => new \DateTime('2025-02-30'),
                'description' => 'Join us for a refreshing yoga session in the park.',
                'image' => 'images/4.jpg',
                'latitude' => 35.7697,
                'longitude' => 10.8284
            ]
        ];
        return $this->render('feed.html.twig', [
            'events' => $events
        ]);    
        }else{
            return new Response('incorrect password');
        }
    
}else {
    return new Response('User not found');
}

        // don't navigate to feed if not successful


            


    }

   

}