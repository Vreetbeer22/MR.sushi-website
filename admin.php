<?php
session_start();

if (!isset($_SESSION['ingelogt']) || $_SESSION['ingelogt'] !== true) {
    header("Location: login.php");
    exit();
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
        
    </main>
</body>
</html>