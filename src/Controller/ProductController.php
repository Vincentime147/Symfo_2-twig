<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name : 'products')] 
    public function products(Request $request) { 
        //$all_param = $request->query->all();

        $products = [
            ['name' => 'Tablette graphique avec ecran', 'price' => 1199],
            ['name' => 'Tablette graphique simple', 'price' => 300],
            ['name' => 'Stylo tablette', 'price' => 50],
            ['name' => 'Carnet de dessin', 'price' => 20],
            ['name' => 'crayon couleur unité', 'price' => 5],
            ['name' => 'crayon papier', 'price' => 2],
            ['name' => 'kit de dessins', 'price' => 300],
        ];
        return $this->render('product/products.html.twig', [
            'products' => $products,
        ]);
    }


    #[Route('/product/{id}', name: 'product_detail')]
    public function showProductDetail(Request $request, $id): Response
    {
        // Supposons que vous ayez une source de données avec les détails des produits.
        $products = [
            ['id' => 1, 'name' => 'Tablette graphique avec ecran', 'price' => 1199, 'description' =>'Tablette graphique haute game'],
            ['id' => 2, 'name' => 'Tablette graphique simple', 'price' => 300, 'description' =>'Tablette graphique bon marché, bonne qualité'],
            ['id' => 3, 'name' => 'Stylo tablette', 'price' => 50, 'description' =>'Stylet de remplacement'],
            ['id' => 4, 'name' => 'Carnet de dessin', 'price' => 20, 'description' =>'Carnet papier relié, standare, efficace'],
            ['id' => 5, 'name' => 'crayon couleur unité', 'price' => 5, 'description' =>'crayon a l unité'],
            ['id' => 6, 'name' => 'crayon papier', 'price' => 2, 'description' =>'crayon a l unité'],
            ['id' => 7, 'name' => 'kit de dessins', 'price' => 300, 'description' =>'kit complet, grandre variété de crayon couleur/papier + un tail crayon + gomme + régle. Luxe'],
        ];

        $product = null;

        foreach ($products as $item) {
            if ($item['id'] == $id) {
                $product = $item;
                break;
            }
        }

        if ($product) {
            return $this->render('product/product_detail.html.twig', [
                'product' => $product,
            ]);
        } else {
            throw $this->createNotFoundException('Produit non trouvé');
        }
    }
}
