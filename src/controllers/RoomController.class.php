<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Room };

class RoomController
{

    public function indexAction()
    {
        $rooms = Manager::$em->getRepository(Room::class)->findAll();

        Views::render('room.index', [
            'rooms' => $rooms
        ]);
    }
    
    public function showAction($params)
    {
        $id = $params['URL'][0];
        $post = $params['POST'];
        $room = Manager::$em->find(Room::class, $id);

        return Views::render('room.show', [
            'room' => $room
        ]);
    }

    public function createAction($params)
    {
        $post = $params['POST'];
        if (count($post) > 0) {
            $errors = [];
            $room = new Room();
            
            if (count( Manager::$em->getRepository(Room::class)->findBy( ['number' => $post['number']] ) ) > 0) {
                $errors[] = "Désolé ce numéro est déjà utilisé.";
            } else {
                $room->setNumber($post['number']);
                Manager::$em->persist($room);
                Manager::$em->flush();
                
                $rooms = Manager::$em->getRepository(Room::class)->findAll();
                return Views::render('room.index', [
                    'rooms' => $rooms
                ]);
            }
        }

        return Views::render('room.create');
    }

    public function editAction($params)
    {
        $post = $params['POST'];
        $id = $params['URL'][0];
        $room = Manager::$em->find(Room::class, $id);

        if (count($post) > 0) {
            $errors = [];
            if (count( Manager::$em->getRepository(Room::class)->findBy( ['number' => $post['number']] ) ) > 0) {
                $errors[] = "Désolé ce numéro est déjà utilisé.";
            } else {
                $room->setNumber($post['number']);
                Manager::$em->persist($room);
                Manager::$em->flush();
                
                $rooms = Manager::$em->getRepository(Room::class)->findAll();
                return Views::render('room.index', [
                    'rooms' => $rooms
                ]);
            }
        }

        return Views::render('room.edit', [
            'room' => $room
        ]);
    }

}
