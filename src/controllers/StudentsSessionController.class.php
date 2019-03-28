<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Formation, Session, StudentsSession, Person, Room };

class StudentsSessionController
{   
    public function showAction($params)
    {
        $id = $params['URL'][0];
		$studentsSession = Manager::$em->find(StudentsSession::class, $id);
				
        return Views::render('studentsSession.show', [
            'studentsSession' => $studentsSession
        ]);
    }

    public function editAction($params)
    {
        $post = $params['POST'];
        $id = $params['URL'][0];
        $studentsSession = Manager::$em->find(StudentsSession::class, $id);

        if (count($post) > 0) {
			$studentsSession->setNote($post['note']);
			
			Manager::$em->persist($studentsSession);
			Manager::$em->flush();
			
			return Views::render('studentsSession.show', [
				'studentsSession' => $studentsSession
			]);
        }

        return Views::render('studentsSession.edit', [
            'studentsSession' => $studentsSession
        ]);
	}
}
