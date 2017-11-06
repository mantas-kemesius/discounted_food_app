<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationCustomerController extends AbstractRegistrationController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function registerAction(Request $request): Response
    {
        return parent::register($request, Customer::class);
    }
}
