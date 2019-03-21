<?php

namespace Formazion\Controller;

use Formazion\Model\Person;
use Formazion\Core\Views;
use Formazion\Core\EntityManager;

class IndexController
{

    public function indexAction()
    {

        $faker = \Faker\Factory::create();
        $person = new Person();
        $person->setFirstname("ccc");
        $person->setLastname("cccc");
        $person->setRole("blblbllblbl");
        var_dump(EntityManager::$em);
        EntityManager::$em->persist($person);
        $entityManager->flush();

        Views::render('home');
    }

}
