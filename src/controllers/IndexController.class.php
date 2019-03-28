<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Person, Company, Session, Formation };
use Formazion\Repository\SessionRepository;

require_once 'src/repository/SessionRepository.php';

class IndexController
{

    public function indexAction()
    {
        $employees = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_EMPLOYEE']);
        $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);
        $companies = Manager::$em->getRepository(Company::class)->findAll();
        $sessions = Manager::$em->getRepository(Session::class)->findAll();
        $formations = Manager::$em->getRepository(Formation::class)->findAll();

        $sessions = Manager::$em->getRepository(Session::class)->getNextWeekSessions();
        


        Views::render('home', [
            'employees' => $employees,
            'teachers' => $teachers,
            'companies' => $companies,
            'formations' => $formations,
            'sessions' => $sessions
        ]);
    }

}
