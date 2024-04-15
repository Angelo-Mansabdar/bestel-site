<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>Admin-Page</title>
</head>

<body>

    <?php
    include('connections.php');
    session_start();
    if ($_SESSION['is_admin'] !== "admin") {
        echo "U heeft geen toegang tot deze pagina.";
        exit();
    } else {
        function isAdmin()
        {
            return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === "admin";
        }
        $header_to_include = isAdmin() ? 'admin-header.php' : 'header.php';
        include($header_to_include);
    ?>
        <main>

            <div class="form-container">

                <table class="start-forms product-table">

                    <thead>
                        <tr>
                            <th class="product-name">Gerecht</th>
                            <th class="product-price">Prijs</th>
                            <th></th>
                            <th>
                                <form method="GET" action="add-product.php">
                                    <button type="submit" id="one-time-shadow" class='add-to-cart-btn'> -Toevoegen- </button>
                                </form>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM products";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<form method='POST' action='product-update.php'>";
                            echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
                            echo "<td class='product-name'><input type='text' name='product_name' value='" . $row['productname'] . "'><br><small><input type='text' name='description' value='" . $row['description'] . "'></td>";
                            echo "<td class='product-price'><input type='text' name='price' value='" . $row['price'] . "'></td>";
                            echo "<td><button type='submit' class='add-to-cart-btn'>Update</button></td>";
                            echo "</form>";

                            // Delete knop
                            echo "<form method='POST' action='product-delete.php' onsubmit='return confirm(\"Weet je zeker dat je dit product wilt verwijderen?\")'>";
                            echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
                            echo "<td><button type='submit' class='add-to-cart-btn'>Verwijderen</button></td>";
                            echo "</form>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>



        </main>

        <?php

        include('footer.php');

        ?>
</body>




</html>
<?php
    }
