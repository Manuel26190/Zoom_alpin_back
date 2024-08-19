Détails de l'API Backend (en PHP)
Voici un résumé des endpoints de l'API:

Utilisateur

POST http://localhost/backend_api/?url=register : Inscription d'un nouvel utilisateur.
POST http://localhost/backend_api/?url=login : Connexion d'un utilisateur, retourne les informations de l'utilisateur et un token JWT.

Tâches

GET http://localhost/backend_api/?url=tasks : Récupérer toutes les tâches de l'utilisateur connecté. (Token requis)
POST http://localhost/backend_api/?url=add_task : Créer une nouvelle tâche. (Token requis)
POST http://localhost/backend_api/?url=update_task&id=id_de_la_tache : Mettre à jour une tâche existante.
GET http://localhost/backend_api/?url=remove_task&id=id_de_la_tache : Supprimer une tâche. (Token requis)
GET http://localhost/backend_api/?url=complete_task&id=id_de_la_tache : Marquer une tâche comme complétée ou non complétée.

lancer le server back :
symfony server:start

lancer le front:
ng serve
