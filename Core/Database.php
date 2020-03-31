<?php

class Database
{
    private $db_name;
    private $db_host;
    private $db_login;
    private $db_password;
    private $pdo;

    public function __construct($db_name = "PiePHP", $db_host = "localhost", $db_login = "victor", $db_password = "RooT35510_")
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_login = $db_login;
        $this->db_password = $db_password;
    }

    public function getPDO()
    {
        $pdo = new PDO('mysql:dbname=PiePHP;host=localhost', 'victor', 'RooT35510_');
        $pdo->exec("SET CHARACTER SET utf8");
        $this->pdo = $pdo;
        return $pdo;
    }
}
