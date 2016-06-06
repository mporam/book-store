<?php

class DbConnection
{

    public $db;

    public function __construct()
    {

        $servername = "192.168.20.56";
        $username = "root";
        $password = "";

        try {
            $db = new PDO("mysql:host=$servername;dbname=book-store", $username, $password);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            $db = false;
        }


        $this->db = $db;
    }

    public function getDB()
    {
        return $this->db;
    }

}