<?php

namespace App\Repository;
use App\Entity\User;
use App\Entity\Event;

use PDO;

class EventRepository {
    private PDO $connexion;

    // Coonection a la Base de données
    public function __construct(){
        $this->connexion = new PDO(        
        'mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'].';port='.$_ENV['DATABASE_PORT'],
        $_ENV['DATABASE_USER'],
        $_ENV['DATABASE_PASSWORD']        
        );
    }

    // Methode pour récuperer tous les evenements
    public function findAllEvents():array {
        $query = $this->connexion->prepare('SELECT * FROM events');
        $query->execute();
        $result = $query->fetchAll();
        $events = [];       

        foreach($result as $event) {
            $events[] = new Event(
                $event['id'], 
                $event['title'], 
                $event['description'], 
                $event['location'], 
                $event['image'], 
                new \DateTimeImmutable($event['date_start'])
            );
        }
        return $events;
    }

    // Methode pour ajouter un evenement
    public function persistEvent(Event $event): void {
        $query = $this->connexion->prepare('INSERT INTO events (title, description, location, image, date_start) VALUES (:title, :description, :location, :image, :date_start)');
        $query->bindValue(':title', $event->getTitle());
        $query->bindValue(':description', $event->getDescription());
        $query->bindValue(':location', $event->getLocation());
        $query->bindValue(':image', $event->getImage());
        $query->bindValue(':date_start', $event->getDateStart()->format('Y-m-d H:i:s'));
        $query->execute();
        // Récupèration de l'id auto incrémenté pour l'assigner au chien qu'on vient de faire persister
        $event->setId($this->connexion->lastInsertId());
    }


}





