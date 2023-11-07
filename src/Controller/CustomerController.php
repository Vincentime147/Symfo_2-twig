<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/customers', name: 'customers_list')]
    public function listCustomers(): Response
    {
        $customers = [
            ['name' => 'Vincentime'],
            ['name' => 'Jonas'],
            ['name' => 'Baptiste'],
            ['name' => 'Bazelgeuse'],
            ['name' => 'Nokero'],
            ['name' => 'Akane'],
            ['name' => 'TeaPot'],
            ['name' => 'Batlamyus Prime'],
        ];
        return $this->render('customer/customers.html.twig', [
            'customers' => $customers,
        ]);
    }
}
