<?php
 
class db {
    private $pdo;
 
    public function __construct() {
       
        $host = "db";
        $db = "mydatabase";
        $user = "user";
        $password = "password";
 
        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    }
   
    public function get_connection(): PDO {
        return $this->pdo;
    }
 
    public function get_last_id(string $table): int {
       
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
        $result = $this->pdo->query($sql);
        $row = $result->fetch();
        if ($row === null) return 0;
        return $row["id"] + 1;
    }
}
?>

