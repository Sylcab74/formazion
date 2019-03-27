<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Formation, Person, Company, Session };

class PersonController
{

    public function indexAction()
    {
        $employees = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_EMPLOYEE']);
        $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);

        Views::render('person.index', [
            'teachers' => $teachers,
            'employees' => $employees
        ]);
    }
    
    public function assignSessionAction($params)
    {
        $formations = Manager::$em->getRepository(Formation::class)->findAll();

        Views::render('person.assignSession', [
            'formations' => $formations
        ]);
    }

    public function assignFormationAction($params)
    {
        // SHOW ALL FORMATIONS, CREATES SESSION AND SET THE CUSTOMER ID
    }

    public function getSessionAction($params)
    {
        $response = [];
        $post = $params['POST'];

        $sessions = Manager::$em->getRepository(Session::class)->findBy(['formations' => $params['POST']]);
        
        $response['status'] = 'success';
        $response['response'] = $sessions;

        echo json_encode($response);
    }


    public function showAction($params)
    {
        $id = $params['URL'][0];
        $person = Manager::$em->find(Person::class, $id);

        $formations = $person->getFormations();

        return Views::render('person.show', [
            'person' => $person,
            'formations' => $formations
        ]);
    }

    public function createAction($params)
    {
        $post = $params['POST'];
        $roles = ['ROLE_EMPLOYEE', 'ROLE_TEACHER'];
        $companies = Manager::$em->getRepository(Company::class)->findAll();

        if (count($post) > 0) {
            $person = new Person();
            $person->setFirstname($post['firstname']);
            $person->setLastname($post['lastname']);
            $person->setRole($post['role']);
            
            if ($person->getRole() === "ROLE_TEACHER" ) {
                $company = Manager::$em->find(Company::class, $post['company']);
                $person->setCompanies($company);
            } else {
                $person->setCompanies(null);
            }
            
            Manager::$em->persist($person);
            Manager::$em->flush();
            
            $employees = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_EMPLOYEE']);
            $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);
            
            return Views::render('person.index', [
                'teachers' => $teachers,
                'employees' => $employees
            ]);
        }

        return Views::render('person.create', [
            'roles' => $roles,
            'companies' => $companies
        ]);
    }

    public function editAction($params)
    {
        $post = $params['POST'];
        $id = $params['URL'][0];
        $person = Manager::$em->find(Person::class, $id);
        $companies = Manager::$em->getRepository(Company::class)->findAll();
        $roles = ['ROLE_EMPLOYEE', 'ROLE_TEACHER'];

        if (count($post) > 0) {
            $person->setFirstname($post['firstname']);
            $person->setLastname($post['lastname']);
            $person->setRole($post['role']);
            
            if ($person->getRole() === "ROLE_TEACHER" ) {
                $company = Manager::$em->find(Company::class, $post['company']);
                $person->setCompanies($company);
            } else {
                $person->setCompanies(null);
            }
            
            Manager::$em->persist($person);
            Manager::$em->flush();
            
            $employees = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_EMPLOYEE']);
            $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);
            
            return Views::render('person.index', [
                'teachers' => $teachers,
                'employees' => $employees
            ]);
        }

        return Views::render('person.edit', [
            'person' => $person,
            'roles' => $roles,
            'companies' => $companies
        ]);
    }

    public function deleteAction($params)
    {
        $id = $params['URL'][0];
        $formation = Manager::$em->find(Formation::class, $id);
        Manager::$em->remove($formation);
        Manager::$em->flush();

        $formations = Manager::$em->getRepository(Formation::class)->findAll();

        Views::render('formation.index', [
            'formations' => $formations
        ]);
    }

}
