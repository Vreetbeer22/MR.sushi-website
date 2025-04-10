<?php
session_start();
include("connect.php");

$is_ingelogd = $_SESSION["ingelogt"] ?? false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
</head>
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
        <?php if ($is_ingelogd) { ?>
            <div class="naast">
                <a href="loguit.php">
                    <div class="login-knop">
                        <h3>Uitloggen</h3>
                    </div>
                </a>
                <a href="admin.php">
                    <div class="login-knop">
                        <h3>Admin</h3>
                    </div>
                </a>
            </div>
        <?php } else { ?>
            <div class="login-knop" id="openModal">
                <h3>Inloggen</h3>
            </div>
            <div id="loginModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Login</h2>
                    <form action="login.php" method="post">
                        <label for="gebruikersnaam">Gebruikersnaam:</label>
                        <input type="text" name="username" id="gebruikersnaam" required><br><br>

                        <label for="wachtwoord">Wachtwoord:</label>
                        <input type="password" name="password" id="wachtwoord" required><br><br>

                        <button type="submit" name="login">Inloggen</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
    <h1>Menu</h1>
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
<script src="js/script.js"></script>
</body>

</html>