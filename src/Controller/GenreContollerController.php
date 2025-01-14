<?php

namespace App\Controller;

use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GenreContollerController extends AbstractController
{
    #[Route('/genre/{id}', name: 'app_genre_contoller')]
    public function index(Genre $genre): Response
    {
        return $this->render('genre_contoller/index.html.twig', [
            'genre' => $genre,
            'books' => $genre->getBooks()
        ]);
    }

    #[Route('/genre', name: 'app_genre')]
    public function genre(): Response
    {
        return $this->render('genre_contoller/genre.html.twig');
    }
}
