<?php

class UserController
{

    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        require_once '././Core/Controller.php';
        require_once '././src/Model/UserModel.php';
    }

    public function loginAction()
    {
        $form = new Controller('login');

        if(isset($_POST['submit']))
        {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if(!empty($email) && !empty($password))
                {
                    /*
                    $registerUser = new UserModel();
                    $registerUser->login($email, $password); */
                    echo "conncecte";
                } else {
                    echo "Tous les champs ne sont pas remplis";
                }
            } else {
                echo "Adresse mail non valide";
            }
        }
    }

    public function registerAction()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $form = new Controller('register');

        if(isset($_POST['submit']))
        {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if(!empty($email) && !empty($password))
                {
                    $registerUser = new UserModel();
                    $registerUser->save($email, $password);
                    } else {
                 echo "Tous les champs ne sont pas remplis";
                }
            } else {
                echo "Adresse mail non valide";
            }
        }
    }

}