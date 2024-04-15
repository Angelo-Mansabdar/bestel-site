<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>Document</title>
</head>



<body>
    <?php
    include('connections.php');
    session_start();

    // Controleer of de gebruiker een admin is
    if ($_SESSION['is_admin'] !== "admin") {
        echo "U heeft geen toegang tot deze pagina.";
        exit();
    } else {
        function isAdmin() {
            return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === "admin";
        }
        
        // Choose which header to include based on whether the user is an admin
        $header_to_include = isAdmin() ? 'admin-header.php' : 'header.php';

        include($header_to_include);

        ?>
    

        <main>

        <div id="align-2"></div>

            <h2>Nieuw Product Toevoegen</h2>
            <form method="POST" action="product-add.php" )
                <label for="product_name">Productnaam:</label><br>
                <input type="text" id="product_name" name="productname"><br>
                <label for="description">Beschrijving:</label><br>
                <textarea id="description" name="description"></textarea><br>
                <label for="price">Prijs:</label><br>
                <input type="text" id="price" name="price"><br>
                <button class="add-to-cart-btn" type="submit">Toevoegen</button>
            </form>

        </main>

        <?php

        include('footer.php');

        ?>
</body>




</html>
<?php
    }
