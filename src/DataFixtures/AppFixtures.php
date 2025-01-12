<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadUSer($manager);

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
}
