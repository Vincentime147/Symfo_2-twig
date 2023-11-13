<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Customer;
use App\Form\CustomerType;

class CustomerController extends AbstractController
{
    #[Route('/customerform', name: 'customerform')]
    public function index(Request $request): Response
    {
        
        $customer = new Customer();
        $customerForm = $this->createForm(CustomerType::class, $customer);

        $customerForm->handleRequest($request);
        if ($customerForm->isSubmitted() && $customerForm->isValid()) {
            // Traitement des données soumises, par exemple, enregistrement dans la base de données.
            // Pour l'instant, affichons simplement les données soumises :
            dump($request->request->all());
            return $this->render('customer/index.html2.twig', [
                'request' => $request->request->all(),
            ]);
            /*return $this->redirectToRoute("page1", [
                'request' => 'variable passez par url',
            ]);*/
            }
           
        return $this->render('customer/index.html.twig', [
            'customerForm' => $customerForm->createView(),
        ]);
    }


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
