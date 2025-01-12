<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(UserRepository $userRepository): Response
    {
        if ($this->getUser() === null) {
            return $this->redirectToRoute('app_login');
        }
        if ($this->isGranted('ROLE_BANNED')) {
            return $this->redirectToRoute('app_banned');
        }
        $users = $userRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'users' => $users
        ]);
    }

    #[Route('/banned', name: 'app_banned')]
    public function banned(): Response
    {
        return $this->render('home/banned.html.twig');
    }
}
