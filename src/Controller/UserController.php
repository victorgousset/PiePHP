<?php

class UserController
{

    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        require '././Core/Controller.php';
        $t = new Controller('login');
    }

    public function testAction()
    {
        echo "e";
    }

    public function loginAction()
    {
        echo "<form method=\"POST\">
                    <label>Email: <input type=\"text\" name=\"email\"></label>
                    <label>Password: <input type=\"password\" name=\"password\"></label>
                    <input type=\"submit\" value=\"S'inscrire\" name=\"submit\">
                </form>";

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
        echo "<form method=\"POST\">
                    <label>Email: <input type=\"text\" name=\"email\"></label>
                    <label>Password: <input type=\"password\" name=\"password\"></label>
                    <input type=\"submit\" value=\"S'inscrire\" name=\"submit\">
                </form>";

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
                    $registerUser->save($email, $password); */
                    echo "enregistrer";
                    } else {
                 echo "Tous les champs ne sont pas remplis";
                }
            } else {
                echo "Adresse mail non valide";
            }
        }
    }

}