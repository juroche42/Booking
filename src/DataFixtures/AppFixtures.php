<?php

namespace App\DataFixtures;

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
}
