<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    #[Route('/author/{id}', name: 'app_author')]
    public function index(Author $author): Response
    {
        return $this->render('author/index.html.twig', [
            'author' => $author,
            'books' => $author->getBooks()
        ]);
    }
}
