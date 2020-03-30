<?php

class UserModel extends Database
{
    private $email;
    private $password;

    private $bdd;

    public function save($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $this->bdd = $this->getPDO();

        $saveUser = $this->bdd->prepare("INSERT INTO users(email, password) VALUES(?, ?)");
        $saveUser->execute(array($this->email, $this->password));
    }

    public function login($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $this->bdd = $this->getPDO();

        $loginUser = $this->bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $loginUser->execute(array($this->email, $this->password));

        if($loginUser->rowCount() == 1)
        {
            echo "OK !";
        }
    }
}