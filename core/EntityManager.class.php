<?php

namespace Formazion\Core;

class EntityManager
{
    static $em;

    private static $instance = null;


    private function __construct($entity)
    {
        $this->em = $entity;
    }


    public static function getInstance($entity) {

        if(is_null(self::$instance)) {
            self::$instance = new EntityManager($entity);
        }

        return self::$instance;
    }
}
