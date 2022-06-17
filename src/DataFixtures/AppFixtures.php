<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;
use App\Entity\Authors;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        //creatino de la liste des auteurs
        for($i = 0 ;$i < 10 ; $i++){
            $author = new Authors();
            $author->setFirstName("Prénom" . $i);
            $author->setLastName("Nom" . $i);
            $author->setRelation('la relation'. $i);
            $manager->persist($author);
            $listAuthor[] = $author;
        }
        for($i = 0 ;$i < 20;$i++){
            $book = new Book;
            $book ->setTitle('Livre' . $i);
            $book->setCoverText('Quatrieme de couverture numéro:'. $i);
            //$book->setAuthor($listAuthor[array_rand($listAuthor)]);
            $manager->persist($book);}
        $manager->flush();
    }
}
