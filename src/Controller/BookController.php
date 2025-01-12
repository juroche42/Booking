<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{
    #[Route('/book/{id}', name: 'app_book')]
    public function index(Book $book, AuthorRepository $authorRepository): Response
    {
        $author = $book->getAuthor();
        $genres = $book->getGenre();
        return $this->render('book/index.html.twig', [
            'book' => $book,
            'author' => $author,
            'genres' => $genres
        ]);
    }
}
