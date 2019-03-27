<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Formation, Person };

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
        $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);

        if (count($post) > 0) {
            $errors = [];
            $room = new Formation();
            
            if (count( Manager::$em->getRepository(Formation::class)->findBy( ['name' => $post['name']] ) ) > 0) {
                $errors[] = "Désolé ce nom est déjà utilisé.";
            } 
            if (count($errors)) {
                return Views::render('formation.create', [
                    'errors' => $errors,
                    'teachers' => $teachers
                ]);
            } else {
                $formation = new Formation();
                $teacher = Manager::$em->find(Person::class, $post['teacher']);
                $formation->setName($post['name']);
                $formation->setResponsibleProfessor($teacher);
                
                Manager::$em->persist($formation);
                Manager::$em->flush();
                
                $formations = Manager::$em->getRepository(Formation::class)->findAll();
                return Views::render('person.index', [
                    'teachers' => $teachers,
                    'employees' => $employees
                ]);
            }
        }

        return Views::render('formation.create', [
            'teachers' => $teachers
        ]);
    }

    public function editAction($params)
    {
        $post = $params['POST'];
        $id = $params['URL'][0];
        $person = Manager::$em->find(Person::class, $id);
        $roles = ['ROLE_EMPLOYEE', 'ROLE_TEACHER'];

        if (count($post) > 0) {
            $person->setFirstname($post['firstname']);
            $person->setLastname($post['lastname']);
            $person->setRole($post['role']);
            
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
            'roles' => $roles
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
