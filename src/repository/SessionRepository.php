<?php

namespace Formazion\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use Formazion\Core\Manager;

class SessionRepository extends EntityRepository
{

    public function findPreviousWeekSessions()
    {

        $query = $this->_em->createQuery('SELECT u FROM Formazion\Models\Session u WHERE DATE_DIFF(CURRENT_DATE(), u.starting) < 7 ');
        $nextSessions = $query->getResult();

        return $nextSessions;

    }
}
