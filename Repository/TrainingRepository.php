<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//Trainer.php';
require_once __DIR__.'//..//Models//Address.php';
require_once __DIR__.'//..//Models//Gym.php';
require_once __DIR__.'//..//Models//Activity.php';

class TrainingRepository extends Repository {

    function getActivities(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT a.id_activity, a.date, a.type, ad.city, ad.street,ad.id_address,ad.code, g.id_gym, g.name, t.id_trainer, t.name as tname, t.surname
            FROM activity a INNER JOIN gym g ON a.id_gym=g.id_gym INNER JOIN address ad ON ad.id_address=g.id_address INNER JOIN trainer t ON t.id_trainer = a.id_trainer
        ');
        $stmt->execute();
        $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($activities as $activity) {
            $result[] = new Activity($activity['id_activity'], new Gym($activity['id_gym'],new Address($activity['id_address'],$activity['city'],$activity['street'],$activity['code']),$activity['name']),$activity['type'],$activity['date'], new Trainer($activity['id_trainer'],$activity['tname'],$activity['surname'])
            );
        }
        return $result;
    }

    function getYourTrainings(int $idUser): array {
        $result = [];
        $stmt = $this->database->connect()->prepare("
            SELECT a.id_activity, a.date, a.type, ad.city, ad.street,ad.id_address,ad.code, g.id_gym, g.name, t.id_trainer, t.name as tname, t.surname
            FROM activity a INNER JOIN gym g ON a.id_gym=g.id_gym INNER JOIN address ad ON ad.id_address=g.id_address INNER JOIN trainer t ON t.id_trainer = a.id_trainer INNER JOIN training tr ON a.id_activity = tr.id_activity WHERE tr.id_user ='$idUser' 
        ");
        $stmt->execute();
        $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($activities as $activity) {
            $result[] = new Activity($activity['id_activity'], new Gym($activity['id_gym'],new Address($activity['id_address'],$activity['city'],$activity['street'],$activity['code']),$activity['name']),$activity['type'],$activity['date'], new Trainer($activity['id_trainer'],$activity['tname'],$activity['surname'])
            );
        }
        return $result;
    }

    function signup(int $idUser,int $idActivity){
        $stmt = $this->database->connect()->prepare("
            INSERT INTO training(id_user,id_activity) VALUES ('$idUser','$idActivity')
        ");
        $stmt->execute();


    }

}