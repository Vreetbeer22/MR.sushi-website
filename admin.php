<?php
session_start();

if (!isset($_SESSION['ingelogt']) || $_SESSION['ingelogt'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<?php
include"connect.php";
$database = new db();
$pdo = $database->get_connection();

//toevoegen
if (isset($_POST['toevoegen'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $groep = $_POST['groep'];
    $stmt = $pdo->prepare("INSERT INTO Menukaart (id, naam, omschrijving, prijs, groep) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$id, $naam, $omschrijving, $prijs, $groep]);
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
        <div class="admin-body">
            <h1>Menukaart aanpassen:</h1>

            <h2>Items toevoegen</h2>
            <form method="post">
                ID: <input type="number" name="id" required><br>
                Naam: <input type="text" name="naam" required><br>
                Omschrijving: <textarea name="omschrijving" required></textarea><br>
                Prijs <input type="price" name="prijs" required><br>
                Groep <input type="number" name="groep" required><br>
                <button type="submit" name="toevoegen">Toevoegen</button>
            </form>

            <h2>Items aanpassen</h2>
            <form method="post">
                ID: <input type="number" name="id" required><br>
                Naam: <input type="text" name="naam" required><br>
                Omschrijving: <textarea name="omschrijving" required></textarea><br>
                Prijs <input type="price" name="prijs" required><br>
                Groep <input type="number" name="groep" required><br>
                <button type="submit" name="aanpassen">aanpassen</button>
            </form>

            <h2>Items aanpassen</h2>
            <form method="post">
                ID: <input type="number" name="id"><br>
                Naam: <input type="text" name="naam"><br>
                <button type="submit" name="verwijderen">verwijderen</button>
            </form>
        </div>
    </main>
</body>
</html>