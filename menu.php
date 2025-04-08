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
            <div class="login-knop" id="openModal">
                <h3>Inloggen</h3>
            </div>
            <div id="loginModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Login</h2>
                    <form action="login.php" method="post">
                        <label for="gebruikersnaam">Gebruikersnaam:</label>
                        <input type="text" name="gebruikersnaam" id="gebruikersnaam" required><br><br>

                        <label for="wachtwoord">Wachtwoord:</label>
                        <input type="password" name="wachtwoord" id="wachtwoord" required><br><br>

                        <button type="submit" name="login">Inloggen</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php
            include("connect.php");

            $sql = "SELECT * FROM Menukaart"; 
            $result = mysqli_query($conn, $sql);
    
        ?>
    <script src="js/script.js"></script>
</body>

</html>