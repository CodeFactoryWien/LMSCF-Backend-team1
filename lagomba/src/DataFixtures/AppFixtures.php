<?php

namespace App\DataFixtures;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
   private $passwordEncoder;

   public function __construct(UserPasswordEncoderInterface $passwordEncoder)
   {
       $this->passwordEncoder = $passwordEncoder;
   }

   public function load(ObjectManager $manager)
   {
       $user = new User();
       $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123123'
       ));

       $user->setEmail("user@gmail.com");

       $manager->persist($user);

       $manager->flush();

   }

}