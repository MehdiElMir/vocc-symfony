<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private Generator $faker;

    

    public function __construct(){
        $this->faker = Factory::create('fr_FR');
        
    }

    public function load(ObjectManager $manager): void
    {
          $formation = new Formation();
          $formation->setReference("STCLIO1");
          $formation->setTitle("Insatisfaction, comportement client et réclamations");
          $formation->setHours(30);
          $formation->setDescription("Description 1");
          $manager->persist($formation);

          $formation1 = new Formation();
          $formation1->setReference("STCLIO2");
          $formation1->setTitle("Les enjeux du traitement de l’insatisfaction client et calcul du retour sur investissement");
          $formation1->setHours(30);
          $formation1->setDescription("Description 2");
          $manager->persist($formation1);

          $formation2 = new Formation();
          $formation2->setReference("STCLIO3");
          $formation2->setTitle("Mise en place d’un Système de Traitement des Réclamations Clients (STRC)");
          $formation2->setHours(25);
          $formation2->setDescription("Description 3");
          $manager->persist($formation2);

          $formation3 = new Formation();
          $formation3->setReference("STCLIO4");
          $formation3->setTitle("Les réponses aux clients insatisfaits");
          $formation3->setHours(15);
          $formation3->setDescription("Description 4");
          $manager->persist($formation3);

          $formation4 = new Formation();
          $formation4->setReference("STCLIO5");
          $formation4->setTitle("La gestion du Projet satisfaction Client");
          $formation4->setHours(20);
          $formation4->setDescription("Description 5");
          $manager->persist($formation4);

        for ($i=1; $i<10  ; $i++) { 
            $user = new User();
            $user->setEmail($this->faker->email())
            ->setRoles(['ROLE_USER'])
            ->setPlainPassword('password');

            $manager->persist($user);
        }

        $manager->flush();
    }
}
