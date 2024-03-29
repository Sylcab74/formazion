<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Formation, Person };

class FormationController
{

    public function indexAction()
    {
        $formations = Manager::$em->getRepository(Formation::class)->findAll();

        Views::render('formation.index', [
            'formations' => $formations
        ]);
    }
    
    public function showAction($params)
    {
        $id = $params['URL'][0];
        $formation = Manager::$em->find(Formation::class, $id);

        return Views::render('formation.show', [
            'formation' => $formation
        ]);
    }

    public function createAction($params)
    {
        $post = $params['POST'];
        $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);

        if (count($post) > 0) {
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

        return Views::render('formation.edit', [
            'formation' => $formation,
            'teachers' => $teachers
        ]);
    }
}
