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

    public function create($email, $password)
    {
        $this->bdd = $this->getPDO();

        $saveUser = $this->bdd->prepare("INSERT INTO users(email, password) VALUES(?, ?)");
        $saveUser->execute(array($email, $password));

        $getId = $this->bdd->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
        return $getId->execute(array($email, $password));
    }

    public function read($id)
    {
        $this->bdd = $this->getPDO();

        $read = $this->bdd->prepare("SELECT * FROM users WHERE id = ?");
        $read->execute(array($id));
        while ($result = $read->fetch())
        {
            return $result;
        }
        return null;
    }

    public function update($id, $column, $value)
    {
        $this->bdd = $this->getPDO();

        $request = "UPDATE users SET $column = $value WHERE id = $id";
        $update = $this->bdd->prepare($request);
        $update->execute();
    }

    public function delete($id)
    {
        $this->bdd = $this->getPDO();

        $delete = $this->bdd->prepare("DELETE FROM users WHERE id = ?");
        $delete->execute(array($id));
    }

    public function read_all()
    {
        $read = $this->bdd->prepare("SELECT * FROM users");
        $read->execute();
        while ($result = $read->fetch())
        {
            return $result;
        }
        return null;
    }
}