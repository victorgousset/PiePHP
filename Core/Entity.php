<?php

class Entity
{
    private $bdd;

    public function create($fields)
    {
        if(is_array($fields))
        {
            if(array_key_exists('table', $fields))
            {
                $bdd = new Database();
                $this->bdd = $bdd->getPDO();

                $nbr_param = count($fields);
                $values = "";

                for($i = 0; $i <= $nbr_param; $i++)
                {
                    $values .= " ?,";
                }

                $table = $fields['table'];

                $req = $this->bdd->prepare('INSERT INTO ' . $table . ' VALUES(' . $values . ')');
                $req->execute());
                //marche pas encore
            }
        } else {
            return false;
        }
        return null;
    }

    public function read($fields)
    {
        if(is_array($fields))
        {
            if(array_key_exists('table', $fields) && array_key_exists('id', $fields))
            {
                $bdd = new Database();
                $this->bdd = $bdd->getPDO();

                $req = $this->bdd->prepare("SELECT * FROM " . $fields['table'] . ' WHERE id = ' . $fields['id']);
                $req->execute();
            }
        } else {
            return false;
        }
    return null;
    }

    public function update($fields)
    {
        if(is_array($fields))
        {
            //
        } else {
            return false;
        }
        return null;
    }

    public function delete($fields)
    {
        if(is_array($fields))
        {
            if(array_key_exists('id', $fields) && array_key_exists('table', $fields))
            {
                $bdd = new Database();
                $this->bdd = $bdd->getPDO();

                $req = $this->bdd->prepare('DELETE FROM ' . $fields['table'] . ' WHERE id = ' . $fields['id']);
                $req->execute();
            }
        } else {
            return false;
        }
        return null;
    }
}