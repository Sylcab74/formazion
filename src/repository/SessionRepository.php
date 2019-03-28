<?php

namespace Formazion\Repository;

use Doctrine\ORM\EntityRepository;
use Formazion\Core\Manager;

class SessionRepository extends EntityRepository
{
    public function getNextWeekSessions()
    {
        $query = Manager::$em->createQuery('SELECT u FROM Formazion\Models\Session u WHERE u.starting BETWEEN DATE("now") AND DATE("now", "+6 days")');
        $nextSessions = $query->getResult();

        var_dump($nextSessions);

    }
}
