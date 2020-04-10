<?php

require_once '././Core/Controller.php';

class UserController extends Controller
{
    public function __construct()
    {
        require_once '././src/Model/UserModel.php';
        $request = new Request();
    }

    public function loginAction()
    {
        $this->Render('login');

        if(isset($_POST['submit']))
        {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if(!empty($email) && !empty($password))
                {
                    $registerUser = new UserModel();
                    $registerUser->login($email, $password);
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
        $this->Render('register');

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

    public function listAllUserAction()
    {
        $model = new UserModel();
        $result = $model->read_all_user();

        $this->Render('show', [$result]);
    }

    public function DetailUserAction($id)
    {
        $model = new UserModel();
        $infoUser = $model->readUser($id);

        $this->Render('details', [$infoUser]);
    }

    public function deleteUserAction($id)
    {
        $model = new UserModel();
        $model->deleteUser($id);
        $info = $model->readUser($id);

        $this->Render('delete', [$info]);
    }
}