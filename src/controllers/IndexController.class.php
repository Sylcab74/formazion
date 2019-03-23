<?php

namespace Formazion\Controller;

use Formazion\Core\Manager;
use Formazion\Models\Person;
use Formazion\Core\Views;

class IndexController
{

    public function indexAction()
    {

        $faker = \Faker\Factory::create();
        $person = new Person();
        $person->setFirstname("ccc");
        $person->setLastname("cccc");
        $person->setRole("blblbllblbl");

        Manager::$em->persist($person);
        Manager::$em->flush();

        Views::render('home');
    }

}
