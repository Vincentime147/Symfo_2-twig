<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(): Response
    {
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

    #[Route('/page1', name: 'app_acceuil')]
    public function page_1(): Response
    {
        return $this->render('acceuil/page1.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

    #[Route('/showProducts')] 
    public function showProducts(Request $request) { 
        $product = $request->query->get('product', 'defaultProduct');
                // Affichage du résultat 
        // Vérification de la présence de 'category' 
        $hasCategory = $request->query->has('category'); 
        
        // Récupération des clés des paramètres 
        $paramKeys = $request->query->keys(); 
        // Affichage des résultats 
        dump($product, $hasCategory, $paramKeys);
        
        return new Response('<h1>Utilisation de l\'objet Request dans un Contrôleur<h1>'); }
}
