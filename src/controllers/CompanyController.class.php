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

            $company->setName($post['name']);
            $company->setNumberAddress($post['numberAddress']);
            $company->setStreet($post['street']);
            $company->setPostalCode($post['postalcode']);
            $company->setCity($post['city']);
            $company->setCountry($post['country']);
            Manager::$em->persist($company);
            Manager::$em->flush();

            $companies = Manager::$em->getRepository(Company::class)->findAll();
            return Views::render('company.index', [
                'companies' => $companies
            ]);
        }

        return Views::render('company.edit', [
            'company' => $company
        ]);
    }

    public function createAction($params)
    {
        $post = $params['POST'];
        if (count($post) > 0) {
            $company = new Company();
            $company->setName($post['name']);
            $company->setNumberAddress($post['numberAddress']);
            $company->setStreet($post['street']);
            $company->setPostalCode($post['postalcode']);
            $company->setCity($post['city']);
            $company->setCountry($post['country']);
            Manager::$em->persist($company);
            Manager::$em->flush();

            $companies = Manager::$em->getRepository(Company::class)->findAll();
            return Views::render('company.index', [
                'companies' => $companies
            ]);
        }

        return Views::render('company.create');
    }

}
