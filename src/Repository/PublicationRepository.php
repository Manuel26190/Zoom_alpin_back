<?php

namespace App\Repository;

use App\Entity\Publication;
use PDO;

class PublicationRepository
{
    private PDO $connexion;

    public function __construct(){
        $this->connexion = new PDO(        
        'mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'].';port='.$_ENV['DATABASE_PORT'],
        $_ENV['DATABASE_USER'],
        $_ENV['DATABASE_PASSWORD']        
        );
    }

    // Méthode pour récuperer tous les publications

    public function findAllPublication(): array
    {
        $query = $this->connexion->prepare('SELECT * FROM publications');
        $query->execute();
        $result = $query->fetchAll();
        $publications = [];

        foreach($result as $publication) {
            $publications[] = new Publication(                
                $publication['id'], 
                $publication['title'], 
                $publication['description'], 
                $publication['location'], 
                $publication['zip_code'],
                $publication['type'],
                $publication['image'],  
                new \DateTimeImmutable( $publication['postedat']),
                new \DateTimeImmutable($publication['date_start'])                
            );          
        }
    return $publications;
    }


    // Methode pour ajouter une publication

    public function persistPublication(Publication $publication): void{
        $query = $this->connexion->prepare('INSERT INTO publications (title, description, location, zip_code, type, image, postedat, date_start)
         VALUES (:title, :description, :location, :zip_code, :type, :image, :postedat, :date_start)');
        $query->bindValue(':title', $publication->getTitle());
        $query->bindValue(':description', $publication->getDescription());
        $query->bindValue(':location', $publication->getLocation());
        $query->bindValue(':zip_code', $publication->getZipCode());
        $query->bindValue(':type', $publication->getType());
        $query->bindValue(':image', $publication->getImage());
        $query->bindValue(':date_start', $publication->getDateStart()->format('Y-m-d'));
        $query->bindValue(':postedat', $publication->getPostedat()->format('Y-m-d'));
        $query->execute();
        // Récupèration de l'id auto incrémenté pour l'assigner à l'évènement que l'on vient de faire persister
        $publication->setId($this->connexion->lastInsertId());
    }

}