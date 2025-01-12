<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/profil/{id}', name: 'app_user')]
    public function index(User $user): Response
    {
        return $this->render('user/index.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/admin', name: 'app_user_edit')]
    public function admin(GenreRepository $genreRepository): Response
    {
        $genres = $genreRepository->findAll();
        return $this->render('user/admin.html.twig', [
            'genres' => $genres
        ]);
    }

}
