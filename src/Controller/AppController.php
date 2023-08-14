<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\Inscription;
use App\Entity\NewsLetter;
use App\Form\InscriptionType;
use App\Form\NewsLetterType;
use Doctrine\ORM\EntityManager;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class AppController extends AbstractController
{

    private $formationRepository;
    private $flashMessage;

    public function __construct(FormationRepository $formationRepository, FlashBagInterface $flashMessage)
    {
        $this->formationRepository = $formationRepository;
        $this->flashMessage = $flashMessage;
    }

    #[Route('/', name: 'home')]
    public function home(Request $request,  EntityManagerInterface $entityManager)
    {
        $newsLetter = new NewsLetter;

        $form = $this -> createForm(NewsLetterType::class, $newsLetter);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            $entityManager->persist($newsLetter);
            $entityManager->flush();
            $this->addFlash(
                'notice',
                'Votre email a été envoyé'
            );          
            return $this->redirectToRoute('home'); 
        }
        return $this->render('home.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(Request $request,  EntityManagerInterface $entityManager)
    {
        $contact = new Contact();

        $form = $this -> createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash(
                'notice',
                'Votre contact a été envoyé'
            );          
            return $this->redirectToRoute('contact'); 
        }
          
        return $this->render('contact.html.twig',[
            'form' => $form->createView(),
        ]);
        
    }

    #[Route('/apropos', name: 'apropos')]
    public function apropos()
    {

        return $this->render('apropos.html.twig');
    }

    #[Route('/methode', name: 'methode')]
    public function methode()
    {
        return $this->render('methode.html.twig');
    }

    #[Route('/prestations', name: 'prestations')]
    public function prestations()
    {
        return $this->render('prestations.html.twig');
    }

    #[Route('/formations', name: 'formations')]
    public function formations()
    {
        $formations = $this->formationRepository->findAll();
        return $this->render('formations.html.twig',[
            "formations" => $formations
        ]);
    }

    #[Route('/formationDetails/{id}', name: 'formationDetails')]
    public function formationDetails($id)
    {
        $formation = $this->formationRepository->find($id);
        return $this->render('formationDetails.html.twig',[
            "formation" => $formation
        ]);
    }

    #[Route('/inscription/{id}', name: 'inscription')]
    public function inscription(Request $request, $id): Response
    {
        $inscription = new Inscription();
        $formation_choix = $this->formationRepository->find($id);
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($inscription);
            $entityManager->flush();
            $this->addFlash('success', 'Inscription ajoutée!');

            return $this->redirectToRoute('home');
        }

        return $this->render('inscription.html.twig', [
            'form' => $form->createView(),
            'formation_choix' => $formation_choix
        ]);
    }
}
