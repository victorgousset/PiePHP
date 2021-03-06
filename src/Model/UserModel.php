<?php

//require_once '././Core/Database.php';

class UserModel extends Entity
{
    private $email;
    private $password;

    private $bdd;

    private static $relation = [];

    public function save($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $saveUser = $this->bdd->prepare("INSERT INTO users(email, password) VALUES(?, ?)");
        $saveUser->execute(array($this->email, $this->password));

        echo "Inscription reussite";
    }

    public function login($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $loginUser = $this->bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $loginUser->execute(array($this->email, $this->password));

        if($loginUser->rowCount() == 1)
        {
            echo "OK !";
        } else {
            echo "Mauvais login ou mot de passe";
        }
    }

    public function EmailAlreadyExist($email)
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $verif_email = $this->bdd->prepare("SELECT * FROM users WHERE email = ?");
        $verif_email->execute(array($email));
        return $verif_email->rowCount();
    }

    public function createUser($email, $password)
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $saveUser = $this->bdd->prepare("INSERT INTO users(email, password) VALUES(?, ?)");
        $saveUser->execute(array($email, $password));

        $getId = $this->bdd->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
        return $getId->execute(array($email, $password));
    }

    public function readUser($id)
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $read = $this->bdd->prepare("SELECT * FROM users WHERE id = ?");
        $read->execute(array($id));
        while ($result = $read->fetch())
        {
            return $result;
        }
    }

    public function updateUser($id, $column, $value)
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $request = "UPDATE users SET $column = $value WHERE id = $id";
        $update = $this->bdd->prepare($request);
        $update->execute();
    }

    public function deleteUser($id)
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $delete = $this->bdd->prepare("DELETE FROM users WHERE id = ?");
        $delete->execute(array($id));
    }

    public function read_all_user()
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $read = $this->bdd->prepare("SELECT * FROM users");
        $read->execute();
        while($result = $read->fetchAll())
        {
            return $result;
        }
    }
}