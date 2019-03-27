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
            'teachers' => $teachers
        ]);
    }
    
    public function showAction($params)
    {
        $id = $params['URL'][0];
        $person = Manager::$em->find(Person::class, $id);

        return Views::render('person.show', [
            'person' => $person
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
                return Views::render('formation.index', [
                    'formations' => $formations,
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
        $formation = Manager::$em->find(Formation::class, $id);
        $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);

        if (count($post) > 0) {
            $errors = [];
            if (count( Manager::$em->getRepository(Formation::class)->findBy( ['name' => $post['name']] ) ) > 0) {
                $errors[] = "Désolé ce nom est déjà utilisé.";
            }
            if (count($errors)) {
                return Views::render('formation.edit', [
                    'errors' => $errors,
                    'formation' => $formation,
                    'teachers' => $teachers
                ]);
            } else {
                $teacher = Manager::$em->find(Person::class, $post['teacher']);
                $formation->setName($post['name']);
                $formation->setResponsibleProfessor($teacher);
                
                Manager::$em->persist($formation);
                Manager::$em->flush();
                
                $formations = Manager::$em->getRepository(Formation::class)->findAll();
                
                return Views::render('formation.index', [
                    'formations' => $formations
                ]);
            }
        }

        return Views::render('formation.edit', [
            'formation' => $formation,
            'teachers' => $teachers
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
