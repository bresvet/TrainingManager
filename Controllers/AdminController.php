<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class AdminController extends AppController {

    public function admin()
    {
        $userRepository = new UserRepository();
        if (isset($_SESSION["id"])) {
            $users = $userRepository->getUsers();
            $this->render('admin', ['results' =>$users]);
            return;
        }


        $this->render('admin');
    }

    public function userdeleted()
    {
        $userRepository = new UserRepository();
        if (isset($_SESSION["id"])) {
            $idUser = $_GET['ids'];
            $userRepository->deleteuser($idUser);
        }

        $this->render('userdeleted');

    }

}