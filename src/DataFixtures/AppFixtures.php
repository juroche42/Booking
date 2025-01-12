<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Genre;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadUSer($manager);
        $this->loadGenre($manager);
        $manager->flush();
        $this->loadBook($manager);

        $manager->flush();
    }

    private function loadUSer(ObjectManager $manager) : void
    {
        $users = [
            'user1' => [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => 'admin',
                'roles' => ['ROLE_ADMIN']
            ],
            'user2' => [
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => 'user',
                'roles' => ['ROLE_USER']
            ],
            'user3' => [
                'username' => 'banned',
                'email' => 'banned@example.com',
                'password' => 'banned',
                'roles' => ['ROLE_BANNED']
            ],
        ];
        foreach ($users as $userData) {
            $user = new User();
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPlainPassword($userData['password']);
            $user->setRoles($userData['roles']);
            $manager->persist($user);
        }

    }

    private function loadGenre(ObjectManager $manager): void
    {
        $genres = [
            'genre1' => [
                'name' => 'Action'
            ],
            'genre2' => [
                'name' => 'Adventure'
            ],
            'genre3' => [
                'name' => 'Comedy'
            ],
            'genre4' => [
                'name' => 'Crime'
            ],
            'genre5' => [
                'name' => 'Drama'
            ],
            'genre6' => [
                'name' => 'Fantasy'
            ],
            'genre7' => [
                'name' => 'Historical'
            ],
            'genre8' => [
                'name' => 'Horror'
            ],
            'genre9' => [
                'name' => 'Mystery'
            ],
            'genre10' => [
                'name' => 'Romance'
            ],
            'genre11' => [
                'name' => 'Science Fiction'
            ],
            'genre12' => [
                'name' => 'Thriller'
            ],
            'genre13' => [
                'name' => 'Western'
            ],
        ];
        foreach ($genres as $genreData) {
            $genre = new Genre();
            $genre->setName($genreData['name']);
            $manager->persist($genre);
        }
    }

    private function loadBook(ObjectManager $manager): void
    {
        $books = [
            'book1' => [
                'title' => 'The Hobbit',
                'released_at' => new \DateTime('1937-09-21'),
                'genres' => ['Fantasy', 'Adventure']
            ],
            'book2' => [
                'title' => 'The Lord of the Rings',
                'released_at' => new \DateTime('1954-07-29'),
                'genres' => ['Fantasy', 'Adventure']
            ],
            'book3' => [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'released_at' => new \DateTime('1997-06-26'),
                'genres' => ['Fantasy']
            ],
            'book4' => [
                'title' => 'Harry Potter and the Chamber of Secrets',
                'released_at' => new \DateTime('1998-07-02'),
                'genres' => ['Fantasy']
            ],
            'book5' => [
                'title' => 'Harry Potter and the Prisoner of Azkaban',
                'released_at' => new \DateTime('1999-07-08'),
                'genres' => ['Fantasy']
            ],
            'book6' => [
                'title' => 'Harry Potter and the Goblet of Fire',
                'released_at' => new \DateTime('2000-07-08'),
                'genres' => ['Fantasy']
            ],
            'book7' => [
                'title' => 'Harry Potter and the Order of the Phoenix',
                'released_at' => new \DateTime('2003-06-21'),
                'genres' => ['Fantasy']
            ],
            'book8' => [
                'title' => 'Harry Potter and the Half-Blood Prince',
                'released_at' => new \DateTime('2005-07-16'),
                'genres' => ['Fantasy']
            ],
            'book9' => [
                'title' => 'Harry Potter and the Deathly Hallows',
                'released_at' => new \DateTime('2007-07-21'),
                'genres' => ['Fantasy']
            ],
            'book10' => [
                'title' => 'The Da Vinci Code',
                'released_at' => new \DateTime('2003-03-18'),
                'genres' => ['Mystery', 'Thriller']
            ]
        ];
        foreach ($books as $bookData) {
            $book = new Book();
            $book->setTitle($bookData['title']);
            $book->setReleasedAt($bookData['released_at']);
            foreach ($bookData['genres'] as $genreName) {
                $genre = $manager->getRepository(Genre::class)->findOneBy(['name' => $genreName]);
                $book->addGenre($genre);
            }
            $manager->persist($book);
        }
    }
}
