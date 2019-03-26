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

    public function showAction($params)
    {
        $id = $params['URL'][0];
        $post = $params['POST'];
        $company = Manager::$em->find(Company::class, $id);

        return Views::render('company.show', [
            'company' => $company
        ]);
    }

    public function editAction($params)
    {
        $post = $params['POST'];
        $id = $params['URL'][0];
        $company = Manager::$em->find(Company::class, $id);

        if (count($post) > 0) {
            $errors = [];
            if (count( Manager::$em->getRepository(Company::class)->findBy( ['name' => $post['name']] ) ) > 0) {
                $errors[] = "Désolé ce nom est déjà utilisé.";
            } else {
                $company->setName($post['name']);
                Manager::$em->persist($company);
                Manager::$em->flush();

                $companies = Manager::$em->getRepository(Company::class)->findAll();
                return Views::render('company.index', [
                    'companies' => $companies
                ]);
            }
        }

        return Views::render('company.edit', [
            'company' => $company
        ]);
    }

    public function createAction($params)
    {
        $post = $params['POST'];
        if (count($post) > 0) {
            $errors = [];
            $company = new Company();

            if (count( Manager::$em->getRepository(Company::class)->findBy( ['name' => $post['name']] ) ) > 0) {
                $errors[] = "Désolé ce nom est déjà utilisé.";
            } else {
                $company->setName($post['id']);
                $company->setName($post['name']);
                $company->setName($post['numberAddress']);
                $company->setName($post['street']);
                $company->setName($post['postalcode']);
                $company->setName($post['city']);
                $company->setName($post['country']);
                Manager::$em->persist($company);
                Manager::$em->flush();

                $companies = Manager::$em->getRepository(Company::class)->findAll();
                return Views::render('company.index', [
                    'companies' => $companies
                ]);
            }
        }

        return Views::render('company.create');
    }

}
