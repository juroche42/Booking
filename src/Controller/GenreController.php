<?php

namespace App\Controller;

use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GenreController extends AbstractController
{
    #[Route('/genre/{id}', name: 'app_genre_contoller')]
    public function index(Genre $genre): Response
    {
        return $this->render('genre_contoller/index.html.twig', [
            'genre' => $genre
        ]);
    }
}
