<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id_user'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['role']
        );
    }

    public function getUsers(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['id_user'],
                $user['email'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['role']
            );
        }

        return $result;
    }

    public function addUser(string $email, string $name, string $surname, string $password)
    {
        $stmt = $this->database->connect()->prepare("
            INSERT INTO user(email,name,surname,password,role) VALUES ('$email','$name','$surname','$password','ROLE_USER')
        ");
        $stmt->execute();
    }

    public function deleteuser(int $idUser)
    {
        $stmt = $this->database->connect()->prepare("
            DELETE FROM user WHERE id_user = '$idUser'
        ");
        $stmt->execute();
    }

    public function loggedUser(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM user WHERE id_user = '$id'
        ");
        //$stmt->bindParam(':email', $email, PDO::PARAM_STR);
        //$stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id_user'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['role']
        );
    }

}

