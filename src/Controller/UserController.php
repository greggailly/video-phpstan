<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    /**
     * Index
     *
     * @return Response
     */
    public function index()
    {
        /** @var EntityRepository<User> */
        $repo = $this->getDoctrine()->getRepository(User::class);

        $users = $repo->findByName('Greg');

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
