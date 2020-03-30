<?php


class UserController
{
    private static $_render = "";

    public function __construct()
    {
        self::$_render = "";
    }

    public function loginAction()
    {
        echo $var;
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
                $registerUser = new UserModel();
                $registerUser->save($email, $password);
            }
        }
    }

    protected function Render($view, $scope = [])
    {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View', str_replace('Controller','', basename(get_class($this))), $view]) .'.php';
        if (file_exists($f))
        {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start ();
            include(implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View','index']) .'.php');
            self::$_render = ob_get_clean();
        }
    }
}