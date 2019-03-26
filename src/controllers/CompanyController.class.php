<?php

namespace Formazion\Controller;

use Formazion\Core\{Manager, Views};
use Formazion\Models\{ Person, Company, Session, Formation };

class CompanyController
{

    public function indexAction()
    {
        $companies = Manager::$em->getRepository(Company::class)->findAll();

        Views::render('company.index', [
            'companies' => $companies
        ]);
    }

}
