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



    /*
     *
     *
     *    public function prepareRequestGenre()
    {
        $count = $this->countElementGenre();
        $request = "";

        if($count != 0)
        {
            $i = 0;
            for($i; $i < $count; $i++)
            {
                $request .= " genre = '" . $this->genre[$i] . "'";
            }
            return $request;
        }
        return null;
    }
     *
     *
         public function assembleRequest()
    {
        $loisir = strlen($this->prepareRequestLoisir());
        $ville = strlen($this->prepareRequestVille());

        $request = "SELECT * FROM membre WHERE ";

        if($loisir != 0)
        {
            $request .= $this->prepareRequestGenre() ." AND (". $this->prepareRequestAge() . ") AND (" . $this->prepareRequestLoisir() . ")";
            return $request;
        }
        elseif ($ville != 0)
        {
            $request .= $this->prepareRequestGenre() ." AND (". $this->prepareRequestAge() . ") AND (" . $this->prepareRequestVille() . ")";
            return $request;
        }
        elseif($loisir != 0 && $ville != 0)
        {
            $request .= $this->prepareRequestGenre() ." AND (". $this->prepareRequestAge() . ") AND (" . $this->prepareRequestLoisir() . ") AND (" . $this->prepareRequestVille() . ")";
            return $request;
        }
        elseif($loisir == 0 && $ville == 0)
        {
            $request .= $this->prepareRequestGenre() ." AND (". $this->prepareRequestAge() . ") ";
            return $request;
        }

        return null;
    }
     *
     *
     */
}