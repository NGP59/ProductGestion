<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();


        $faker =  Faker\Factory::create("fr_FR");
        for ($i = 0; $i < 10; $i++) {
            $product[$i] = new Product();
            $product[$i]->setDescription($faker->sentences(2,true));
            $product[$i]->setURLImage($faker->imageUrl());
            $product[$i]->setPrice($faker->randomFloat(2, 1, 50));
            $manager->persist($product[$i]);
        }
        $manager->flush();
    }
}
