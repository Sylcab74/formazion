<?php

namespace Formazion\Controller;

use \Formazion\Core\Views;

class IndexController
{

    public function indexAction()
    {
        Views::render('home');
    }

}
