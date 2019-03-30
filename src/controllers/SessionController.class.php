<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Formation, Session, StudentsSession, Person, Room };
use Formazion\Repository\SessionRepository;

require_once 'src/repository/SessionRepository.php';

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

        return Views::render('session.show', [
            'session' => $session
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
          $session->setHoursPerformed($post['hours']);
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

	public function noteAction($params)
	{
		$id = $params['URL'][0];
		$post = $params['post'];

		$studentSession = Manager::$em->find(StudentsSession::class, $id);

		if (count($post) > 0) {
			$studentSession->setNote($post['note']);

			Manager::$em->persist($studentSession);
          	Manager::$em->flush();
			$sessions = Manager::$em->getRepository(Session::class)->findAll();

			return Views::render('session.index', [
				'studentSession' => $studentSession
			]);
		}

		return Views::render('session.student', [
            'studentSession' => $studentSession
        ]);
	}

	public function previousAction()
    {
        $sessions = Manager::$em->getRepository(Session::class)->findPreviousWeekSessions();

        return Views::render('session.previous', [
            'sessions' => $sessions
        ]);
    }
}
