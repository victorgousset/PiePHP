<?php

//Marche si 2 premiers key de $fields sont 'id' et la table;

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
                $col = "";

                for($i = 2; $i <= $nbr_param; $i++)
                {
                    $col .= " " . $fields[$i] . ",";
                }

                $req = $this->bdd->prepare('INSERT INTO ' . $table . '('. $col.') VALUES(' . $values . ')');
                $req->execute(array($col));
            }
        } else {
            return false;
        }
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
                while($result = $req->fetch())
                {
                    echo $result . "<br>";
                }
            }
        } else {
            return false;
        }
    }

    public function update($fields)
    {
        if(is_array($fields))
        {
            if(array_key_exists('table', $fields) && array_key_exists('id', $fields))
            {
                $bdd = new Database();
                $this->bdd = $bdd->getPDO();

                $this->bdd->prepare("UPDATE " . $fields['table'] ." SET");
                //marche pas encore
            }
        } else {
            return false;
        }
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
    }
}