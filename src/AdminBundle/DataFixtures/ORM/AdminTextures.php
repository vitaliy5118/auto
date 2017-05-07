<?php
// src/AdminBundle/DataFixtures/ORM/AdminFixtures.php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AdminBundle\Entity\Model;
use AdminBundle\Entity\Brand;
use AdminBundle\Entity\Spare;
use AdminBundle\Entity\Category;
use AdminBundle\Entity\SparesCatalog;

class AdminFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // ************* add Models ********************************************
        //add BMW
        $model1 = new Model();
        $model1->setModel('BMW');
        $manager->persist($model1);
        
        //add Skoda
        $model2 = new Model();
        $model2->setModel('Skoda');
        $manager->persist($model2);
        
        //add Hyundai
        $model3 = new Model();
        $model3->setModel('Hyundai');
        $manager->persist($model3);
         
        //************** add Brands ********************************************
        //add BMW 316
        $brand1 = new Brand();
        $brand1->setBrand('316');
        $brand1->setModel($model1);
        $manager->persist($brand1);
        
        //add BMW X5
        $brand2 = new Brand();
        $brand2->setBrand('X5');
        $brand2->setModel($model1);
        $manager->persist($brand2);
        
        //add Skoda Superb
        $brand3 = new Brand();
        $brand3->setBrand('Superb');
        $brand3->setModel($model2);
        $manager->persist($brand3);
        
        //add Hyundai H1
        $brand4 = new Brand();
        $brand4->setBrand('H1');
        $brand4->setModel($model3);
        $manager->persist($brand4);
        
        //************** add Category ******************************************
        //add Category
        $category1 = new Category();
        $category1->setCategory('body');
        $manager->persist($category1);
        
        //add Category
        $category2 = new Category();
        $category2->setCategory('engine');
        $manager->persist($category2);
        
        //add Category
        $category3 = new Category();
        $category3->setCategory('chassis');
        $manager->persist($category3);
        
        //add Category
        $category4 = new Category();
        $category4->setCategory('interior');
        $manager->persist($category4);
        
        //************** add Catalog Spares*************************************
        //add spares catalog
        $spare_cat1 = new SparesCatalog();
        $spare_cat1->setSpare('Крыло левое');
        $spare_cat1->setCategory($category1);
        $manager->persist($spare_cat1);
        
        //add spares catalog
        $spare_cat2 = new SparesCatalog();
        $spare_cat2->setSpare('Крыло правое');
        $spare_cat2->setCategory($category1);
        $manager->persist($spare_cat2);
        
        //add spares catalog
        $spare_cat3 = new SparesCatalog();
        $spare_cat3->setSpare('Капот');
        $spare_cat3->setCategory($category1);
        $manager->persist($spare_cat3);
        
        //add spares catalog
        $spare_cat4 = new SparesCatalog();
        $spare_cat4->setSpare('Двигатель в сборе');
        $spare_cat4->setCategory($category2);
        $manager->persist($spare_cat4);
        
        //************** add Spares ********************************************
        //add Hyundai H1 spare
        $spare1 = new Spare();
        $spare1->setSpare($spare_cat1)
               ->setBrand($brand4)
               ->setCategory($category1)
               ->setPrice(70)
               ->setPresence('ok');
        $manager->persist($spare1);
        
        //add Hyundai H1 spare
        $spare2 = new Spare();
        $spare2->setSpare($spare_cat2)
                ->setBrand($brand4)
                ->setCategory($category1)
                ->setPrice(100)
                ->setPresence('ok');
        $manager->persist($spare2);
        
        //add Hyundai H1 spare
        $spare3 = new Spare();
        $spare3->setSpare($spare_cat3)
                ->setBrand($brand4)
                ->setCategory($category1)
                ->setPrice(200)
                ->setPresence('ok');
        $manager->persist($spare3);
        
        //add Hyundai H1 spare
        $spare4 = new Spare();
        $spare4->setSpare($spare_cat4)
                ->setBrand($brand4)
                ->setCategory($category2)
                ->setPrice(65)
                ->setPresence('ok');
        
        
        $manager->persist($spare4);
        
        $manager->flush();
    }

}