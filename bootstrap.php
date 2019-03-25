<?php

namespace Formazion\Core;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/config/yaml"), $isDevMode);

$conn = array(
    'host' => 'db',
    'driver' => 'pdo_pgsql',
    'user' => 'dev',
    'password' => 'dev_formazion',
    'dbname' => 'formazion',
    'charset' => 'utf8'
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

