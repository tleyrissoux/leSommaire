<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encodeur;

    public function __construct(UserPasswordEncoderInterface $encodeur) {
        $this->encodeur = $encodeur;
    }
    
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setUsername("admin");
        $user->setPassword($this->encodeur->encodePassword($user, "admin"));

        $manager->persist($user);
        $manager->flush();
    }

}