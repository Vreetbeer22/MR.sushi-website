<?php
class db
{
    private $pdo;

    public function __construct()
    {

        $host = "db";
        $db = "mydatabase";
        $user = "user";
        $password = "password";

        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);  //hier wordt de verbinding gemaakt 
    }

    public function get_connection(): PDO
    {
        return $this->pdo;  //geeft de verbinding terug
    }
}
?>