<?php

namespace App\Repository;
use App\Entity\User;
use PDO;

class UserRepository{
    private PDO $connexion;

    // Connection a la Base de données
    public function __construct()
    {
        $this->connexion = new PDO(
            'mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'].';port='.$_ENV['DATABASE_PORT'],
            $_ENV['DATABASE_USER'],
            $_ENV['DATABASE_PASSWORD']
        );
    }

    // Méthode pour ajouter un utilisateur
    public function persistUser(User $user): void
    {
        $query = $this->connexion->prepare('INSERT INTO user (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)');
        $query->bindValue(':firstname', $user->getFirstName());
        $query->bindValue(':lastname', $user->getLastName());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':password', $user->getPassword());
        $query->execute();
        // Récupèration de l'id auto incrémenté pour l'assigner à l'user que l'on vient de faire persister
        //$user->setId($this->connexion->lastInsertId());
    }

    // Methode pour se connecter
    


}

