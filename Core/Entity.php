<?php

class Entity
{
    private $bdd;

    public function create($table, $fields)
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        if($table == "users")
        {
            $this->bdd->prepare("INSERT INTO users VALUES(?, ?, ?)");
        } elseif($table == 'articles')
        {

        }

    }

    public function read($table, $id)
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $request = 'SELECT * FROM ' . $table . 'WHERE id = ' . $id;
        $req = $this->bdd->prepare($request);
        return $req->execute();
    }

    public function update($table, $id, $fields)
    {

    }

    public function delete($table, $id)
    {
        $bdd = new Database();
        $this->bdd = $bdd->getPDO();

        $request = 'DELETE FROM ' . $table . 'WHERE id = ' . $id;
        $req = $this->bdd->prepare($request);
        $req->execute();
    }

}