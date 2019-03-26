<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Formation, Session, StudentsSession, Person, Room };

class SessionController
{

    public function indexAction()
    {
        $sessions = Manager::$em->getRepository(Session::class)->findAll();

        Views::render('session.index', [
            'sessions' => $sessions
        ]);
    }
    
    public function showAction($params)
    {
        $id = $params['URL'][0];
        $session = Manager::$em->find(Session::class, $id);
        $studentsSession = Manager::$em->getRepository(StudentsSession::class)->findBy(['sessions' => $session]);

        return Views::render('session.show', [
            'session' => $session,
            'studentsSession' => $studentsSession
        ]);
    }

    public function createAction($params)
    {
        $post = $params['POST'];
        $formations = Manager::$em->getRepository(Formation::class)->findAll();
        $rooms = Manager::$em->getRepository(Room::class)->findAll();
        $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);

        if (count($post) > 0) {
			$formation = Manager::$em->find(Formation::class, $post['formation']);
			$teacher = Manager::$em->find(Person::class, $post['teacher']);
			$room = Manager::$em->find(Room::class, $post['room']);
			
			$session = new Session();
			$session->setStarting(new \Datetime($post['date'] . $post['startHour']));
			$session->setEnding(new \Datetime($post['date'] . $post['endHour']));
			$session->setReport($post['report']);
			$session->setFormations($formation);
			$session->setTeacher($teacher);
			$session->setRooms($room);
			
			Manager::$em->persist($session);
			Manager::$em->flush();
			
			$sessions = Manager::$em->getRepository(Session::class)->findAll();

			return Views::render('session.index', [
				'sessions' => $sessions,
			]);
        }

        return Views::render('session.create', [
            'teachers' => $teachers,
            'formations' => $formations,
            'rooms' => $rooms
        ]);
    }

    public function editAction($params)
    {
        $post = $params['POST'];
        $id = $params['URL'][0];
        $session = Manager::$em->find(Session::class, $id);
        $formations = Manager::$em->getRepository(Formation::class)->findAll();
        $rooms = Manager::$em->getRepository(Room::class)->findAll();
        $teachers = Manager::$em->getRepository(Person::class)->findBy(['role' => 'ROLE_TEACHER']);

        if (count($post) > 0) {
          $formation = Manager::$em->find(Formation::class, $post['formation']);
		  $teacher = Manager::$em->find(Person::class, $post['teacher']);
		  $room = Manager::$em->find(Room::class, $post['room']);
		  
          $session->setStarting(new \Datetime($post['date'] . $post['startHour']));
          $session->setEnding(new \Datetime($post['date'] . $post['endHour']));
          $session->setReport($post['report']);
          $session->setFormations($formation);
		  $session->setTeacher($teacher);
		  $session->setRooms($room);
          
          Manager::$em->persist($session);
          Manager::$em->flush();
          
          $sessions = Manager::$em->getRepository(Session::class)->findAll();
          
          return Views::render('session.index', [
              'sessions' => $sessions
          ]);
        }

        return Views::render('session.edit', [
            'session' => $session,
            'teachers' => $teachers,
            'formations' => $formations,
            'rooms' => $rooms
        ]);
    }

    public function deleteAction($params)
    {
        $id = $params['URL'][0];
		$session = Manager::$em->find(Session::class, $id);
		
        Manager::$em->remove($session);
        Manager::$em->flush();

        $session = Manager::$em->getRepository(Session::class)->findAll();

        Views::render('session.index', [
            'session' => $session
        ]);
    }

}
