<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;


// Route global pour le controller
#[Route('/api')]

class PublicationController extends AbstractController{

    // Création d'une instance d'EventRepository
    // pour y accéder dans chaque élément avec $this.repo
    public function __construct(
        private PublicationRepository $repo
    ){}

    #[Route('/publications',methods: ['GET'])]

    // Methode pour afficher toutes les publications
    public function getAllPublication(): JsonResponse{
        return $this->json($this->repo->findAllPublication());
    }


    // Methode pour ajouter une publication
    #[Route('/add_publication', methods:['POST'])]
    public function add_publication(#[MapRequestPayload] Publication $publication): JsonResponse {
        $publication->setPostedat(new \DateTimeImmutable());
        $this->repo->persistPublication($publication);
        return $this->json($publication, 201);  
    }
}

