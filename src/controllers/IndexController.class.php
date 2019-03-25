<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{Room, Formation, Person, Company, Session, StudentsSession};

class IndexController
{

    public function indexAction()
    {
        Views::render('home');
    }

}
