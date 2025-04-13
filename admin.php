<?php
session_start();

if (!isset($_SESSION['ingelogt']) || $_SESSION['ingelogt'] !== true) {
    header("Location: login.php");
    exit();
}   //kijkt of je bent ingelogt om te kijken of je wel of niet op de admin pagina kan
?>
<?php
include "connect.php";
$database = new db();
$pdo = $database->get_connection();

//toevoegen
if (isset($_POST['toevoegen'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $groep = $_POST['groep'];

    try {
        $stmt = $pdo->prepare("INSERT INTO Menukaart (id, naam, omschrijving, prijs, groep) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id, $naam, $omschrijving, $prijs, $groep]);
        $melding = "item succesvol toegevoegd";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $melding = "Er bestaat al een item met ID $id.";
        }
    }

}

//aanpassen
if (isset($_POST["aanpassen"])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $groep = $_POST['groep'];
    $stmt = $pdo->prepare("UPDATE Menukaart SET naam = ?, omschrijving = ?, prijs = ?, groep = ? WHERE id = ?");
    $stmt->execute([$naam, $omschrijving, $prijs, $groep, $id]);
}

//verwijderen
if (isset($_POST["verwijderen"])) {
    $id = $_POST["id"];
    $naam = $_POST["naam"];

    if (!empty($id) && !empty($naam)) {
        $stmt = $pdo->prepare("DELETE FROM Menukaart WHERE id = ? OR naam = ?");
        $stmt->execute([$id, $naam]);
    } elseif (!empty($id)) {
        $stmt = $pdo->prepare("DELETE FROM Menukaart WHERE id = ?");
        $stmt->execute([$id]);
    } elseif (!empty($naam)) {
        $stmt = $pdo->prepare("DELETE FROM Menukaart WHERE naam = ?");
        $stmt->execute([$naam]);
    }
}

?>
<?php if (isset($melding)): ?>
    <div class="melding">
        <p><?= $melding ?></p>
    </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <nav>
        <div class="header">
            <div class="naast">
                <img src="images/logo.png" class="logo-header" alt="Logo MR.suchi">
                <a href="index.php">
                    <div class="knop-box">
                        <h1>Home</h1>
                    </div>
                </a>
                <a href="menu.php">
                    <div class="knop-box">
                        <h1>Menu</h1>
                    </div>
                </a>
                <a href="order.php">
                    <div class="knop-box">
                        <h1>Order</h1>
                    </div>
                </a>
                <a href="contact.php">
                    <div class="knop-box">
                        <h1>Contact</h1>
                    </div>
                </a>
            </div>
        </div>
    </nav>
    <main>
        <div class="login-balk">
            <a href="loguit.php">
                <div class="login-knop">
                    <h3>Uitloggen</h3>
                </div>
            </a>
        </div>
        <h1>Menukaart aanpassen:</h1>
        <div class="admin-body">
            <div class="naast ruimte-tussen">
                <div class="form-blok">
                    <h2>Items toevoegen</h2>
                    <form method="post">
                        ID: <input type="number" name="id" class="invulbalk" required><br>
                        Naam: <input type="text" name="naam" class="invulbalk" required><br>
                        Omschrijving: <textarea name="omschrijving" class="invulbalk"></textarea><br>
                        Prijs <input type="price" name="prijs" class="invulbalk" required><br>
                        Groep <input type="number" name="groep" class="invulbalk" required><br>
                        <button type="submit" name="toevoegen" class="invulbalk">Toevoegen</button>
                    </form>
                </div>
                <div class="form-blok">
                    <h2>Items aanpassen</h2>
                    <form method="post">
                        ID: <input type="number" name="id" class="invulbalk" required><br>
                        Naam: <input type="text" name="naam" class="invulbalk" required><br>
                        Omschrijving: <textarea name="omschrijving" class="invulbalk"></textarea><br>
                        Prijs <input type="price" name="prijs" class="invulbalk" required><br>
                        Groep <input type="number" name="groep" class="invulbalk" required><br>
                        <button type="submit" name="aanpassen" class="invulbalk">aanpassen</button>
                    </form>
                </div>
                <div class="form-blok">
                    <h2>Items aanpassen</h2>
                    <form method="post">
                        ID: <input type="number" name="id" class="invulbalk"><br>
                        Naam: <input type="text" name="naam" class="invulbalk"><br>
                        <button type="submit" name="verwijderen" class="invulbalk">verwijderen</button>
                    </form>
                </div>
            </div>
        </div>
        <h1>Items op het menu</h1>
        <?php

        require_once 'connect.php';

        $db = new db();

        $sql = "SELECT * FROM `Menukaart`;";
        $result = $db->get_connection()->query($sql);

        foreach ($result as $row) {


            $template = '
                    <p class="menu-item">%s - %s, %s - €%s</p>
                ';

            echo sprintf($template, $row["id"], $row["naam"], $row["omschrijving"], $row["prijs"]);
        }
        ?>
    </main>
</body>
<script src="js/auto.js"></script>

</html>