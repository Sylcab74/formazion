<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{Room, Formation, Person, Company, Session, StudentsSession};

class IndexController
{

    public function indexAction()
    {
        $faker = \Faker\Factory::create();

        $teachers = [];
        $rooms = [];
        $formations = [];
        $sessions = [];
        $students = [];

        $fcompany = new Company();
        $fcompany->setCity($faker->city);
        $fcompany->setCountry($faker->country);
        $fcompany->setName($faker->company);
        $fcompany->setStreet($faker->streetName);
        $fcompany->setNumberAddress(intval($faker->buildingNumber));
        $fcompany->setPostalCode(intval($faker->buildingNumber));
        Manager::$em->persist($fcompany);

        $scompany = new Company();
        $scompany->setCity($faker->city);
        $scompany->setCountry($faker->country);
        $scompany->setName($faker->company);
        $scompany->setStreet($faker->streetName);
        $scompany->setNumberAddress(intval($faker->buildingNumber));
        $scompany->setPostalcode(intval($faker->buildingNumber));
        Manager::$em->persist($scompany);

        for ($i = 0; $i < 20; $i++) {
            $person = new Person();
            $person->setFirstname($faker->firstName);
            $person->setLastname($faker->lastName);
            $person->setRole("ROLE_EMPLOYEE");

            if ($i % 2 == 0) {
                $person->setCompanies($fcompany);
            } else {
                $person->setCompanies($scompany);
            }

            $students[] = $person;

            Manager::$em->persist($person);
        }

        for ($i = 0; $i < 10; $i++) {
            $room = new Room();
            $room->setNumber($faker->randomDigit);

            $person = new Person();
            $person->setFirstname($faker->firstName);
            $person->setLastname($faker->lastName);
            $person->setRole("ROLE_TEACHER");

            $formation = new Formation();
            $formation->setName($faker->company);
            $formation->setResponsibleProfessor($person);

            $formations[] = $formation;
            $teachers[] = $person;
            $rooms[] = $room;

            Manager::$em->persist($person);
            Manager::$em->persist($formation);
            Manager::$em->persist($room);
        }

        for ($i = 0; $i < 20; $i++) {
            $dateStart = $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null);
            $dateEnd= $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null);

            $session = new Session();
            $session->setTeacher($teachers[$faker->numberBetween($min = 0, $max = 9)]);
            $session->setFormations($formations[$faker->numberBetween($min = 0, $max = 9)]);
            $session->setRooms($rooms[$faker->numberBetween($min = 0, $max = 9)]);
            $session->setStart($dateStart);
            $session->setEnd($dateEnd);

            if ($i % 2 == 0) {
                $session->setHoursPerformed(2);
                $session->setReport($faker->text);
            } else {
                $session->setHoursPerformed(null);
            }

            $sessions[] = $session;
            Manager::$em->persist($session);
        }

        for ($i = 0; $i < 40; $i++) {
            $studentsSession = new StudentsSession();
            $studentsSession->setSessions($sessions[$faker->numberBetween($min = 0, $max = 19)]);
            $studentsSession->setStudents($students[$faker->numberBetween($min = 0, $max = 19)]);

            Manager::$em->persist($studentsSession);
        }



        Manager::$em->flush();

        Views::render('home');
    }

}
