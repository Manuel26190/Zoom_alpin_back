<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

// Route global pour le controller
#[Route('/api')]

class UserController extends AbstractController{    

    // Création d'une instance d'UserRepository
    // pour y accéder dans chaque élément avec $this.repo
    public function __construct(
        private UserRepository $repo,
        private UserPasswordHasherInterface $passwordHasher
    ){ }

    // Methode pour ajouter un user
    #[Route('/add_user', methods:['POST'])]
    
    public function addUser(#[MapRequestPayload()] User $user)
    {
        // Hashage du mot de passe
        $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);

        // Persistance de l'utilisateur
        $this->repo->persistUser($user);
        return $this->json($user, 201);
    }
}