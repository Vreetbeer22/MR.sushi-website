<?php
session_start();
include("connect.php");

// Databasegegevens
$servername = "db";
$database = "mydatabase";
 
try {
   
    // Ophalen van POST-data
    $username = $_POST['gebruikersnaam'] ?? ''; 
    $wachtwoord = $_POST['wachtwoord'] ?? '';

    // Controleer of de gebruiker bestaat in de database
    $query = "SELECT * FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':gebruikersnaam', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Controleer het wachtwoord

    

    // if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
    //     echo "✅ Inloggen geslaagd. Welkom, " . htmlspecialchars($user['Admin']) . "!";
    //     header("Location: admin.php");
    //     exit;
    // } else {
    //     echo "❌ Ongeldige gebruikersnaam of wachtwoord.";
    // }

} catch (PDOException $e) {
    echo "❌ Databasefout: " . $e->getMessage();
}
?>