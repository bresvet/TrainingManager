<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class SecurityController extends AppController {

    public function login()
    {
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $userRepository->getUser($email);

            if (!$user) {
                $this->render('login');
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('login');
                return;
            }

            $_SESSION["id"] = $user->getIdUser();
            $_SESSION["role"] = $user->getRole();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=home");
            return;
        }

        $this->render('login');
    }

    public function registration()
    {
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];

            $userRepository->addUser($email,$name,$surname,$password);

            $user = $userRepository->getUser($email);

            $_SESSION["id"] = $user->getIdUser();
            $_SESSION["role"] = $user->getRole();


            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=home");
        }

        $this->render('registration');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->render('logout');
    }
}
?>