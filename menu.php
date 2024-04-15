<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>Menu</title>
</head>

<body>
    <?php
    session_start();
    include('connections.php');
    function isAdmin() {
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === "admin";
    }
    $header_to_include = isAdmin() ? 'admin-header.php' : 'header.php';
    include($header_to_include);
    ?>
    <main>
    <div id="menu-1"></div>
        <table class="product-table">
            <thead>
                <tr>
                    <th class="product-name">Gerecht</th>
                    <th class="product-price">Prijs</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM products";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td class='product-name'>" . '<strong>' . $row['productname'] . '<br> <small>' . $row['description'] . "</td>";
                    echo "<td class='product-price'>" . '€' . $row['price'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <?php
    include('footer.php');
    ?>
</body>




</html>