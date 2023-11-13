<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Feedback;
use App\Form\FeedbackType;

class FeedbackController extends AbstractController
{
    #[Route('/feedback', name: 'app_feedback')]
    public function index(Request $request): Response
    {
        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $result = $request->request->all();
            return $this->render('feedback/reponse.twig',[
                'Nom'=> $result['feedback']['nomClient'],
                'EmailClient'=> $result['feedback']['emailClient'],
                'NoteDuProduit'=> $result['feedback']['noteProduit'],
                'Commentaires'=> $result['feedback']['commentaires'],
                'DateDeSoumission'=> $result['feedback']['dateSoumission']['date'],
            ]);

        }
        return $this->render('feedback/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
