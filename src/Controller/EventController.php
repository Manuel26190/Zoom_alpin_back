<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


// Route global pour le controller
#[Route('/api')]
class EventController extends AbstractController{    

     // Création d'une instance d'EventRepository
     // pour y accéder dans chaque méthode avec $this.repo
    public function __construct(
        private EventRepository $repo) { }  

    // Méthode pour récupérer tous les evenements
    #[Route('/events',methods: ['GET'])]
    public function getEvents(): JsonResponse {
        return $this->json(
            $this->repo->findAllEvents()
        );
    }

    // Methode pour ajouter un evenement
    #[Route('/add_event', methods:['POST'])]
    public function addEvent(#[MapRequestPayload] Event $event): JsonResponse {
        $event->setPostedat(new \DateTimeImmutable());
        $this->repo->persistEvent($event);
        return $this->json($event, 201);
    }



}





