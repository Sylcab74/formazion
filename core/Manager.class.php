<?php

namespace Formazion\Core;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Manager
{
    static $em;
    private $config;
    private $conn = [
        'host' => 'db',
        'driver' => 'pdo_pgsql',
        'user' => 'dev',
        'password' => 'dev_formazion',
        'dbname' => 'formazion',
        'charset' => 'utf8'
    ];

    private static $instance = null;

    private function __construct()
    {
        $this->config = Setup::createYAMLMetadataConfiguration(array("/var/www/formazion/config/yaml"), true);
        self::$em = EntityManager::create($this->conn, $this->config);
    }


    public static function getInstance()
    {
        if(is_null(self::$instance)) {
            self::$instance = new Manager();
        }

        return self::$instance;
    }
}
