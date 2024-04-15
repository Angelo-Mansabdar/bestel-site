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
    session_start();
    include('connections.php');

    function isAdmin() {
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === "admin";
    }
    
    // Choose which header to include based on whether the user is an admin
    $header_to_include = isAdmin() ? 'admin-header.php' : 'header.php';
    include($header_to_include);
    include('cart.php');

    ?>

    <main>

        <form id="search-form" action="search.php" method="GET">
            <input id="search" name="search" type="text" placeholder="Zoeken">
            <input class="button" id="submit" type="submit" value="Zoek">
        </form>

        <div id="search-results">
            <?php
            include('connections.php');

            try {
                $keyword = '%' . $_GET['search'] . '%';
                $stmt = $conn->prepare("SELECT * FROM products WHERE productname LIKE :keyword OR description LIKE :keyword");
                $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Toon de zoekresultaten in HTML
                foreach ($result as $row) {
                    echo "<div>";
                    echo "<p><strong>Productnaam:</strong> " . $row['productname'] . "</p>";
                    echo "<p><strong>Beschrijving:</strong> " . $row['description'] . "</p>";
                    echo "<p><strong>Prijs:</strong> " . $row['price'] . "</p>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='add_to_cart' value='{$row['id']}'>"; // Use product ID as the value
                    echo "<input type='submit' value='Add to cart' class='add-to-cart-btn'>";
                    echo "</form>";
                    echo "</div>";
                }
            } catch (PDOException $e) {
                echo "Geen product gevonden: " . $e->getMessage();
            }
            ?>
        </div>

        <?php
        // Display the cart items
        if (!empty($_SESSION['cart'])) {
            echo "<h3>Shopping Cart</h3>";
            echo "<ul>";
            $totalPrice = 0;
            foreach ($_SESSION['cart'] as $index => $product) {
                echo "<li>{$product['productname']} - Quantity: {$product['quantity']} - Total: €" . ($product['price'] * $product['quantity']) . " <form method='post'><input type='hidden' name='remove_from_cart' value='$index'><input type='submit' value='Remove'></form></li>";
                $totalPrice += ($product['price'] * $product['quantity']);
            }
            echo "<li><strong>Total Price:</strong> €$totalPrice</li>";
            echo "</ul>";
        } else {
            echo "<h3>Shopping Cart</h3>";
            echo "<p>Your shopping cart is empty.</p>";
        }
        ?>

        <!-- Display the product list -->
        <h2>Products</h2>
        <table class="product-table">
            <thead>
                <tr>
                    <th class="product-name">Gerecht</th>
                    <th class="product-price">Prijs</th>
                    <th class="product-description">Beschrijving</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $index => $product): ?>
                    <tr>
                        <td class="product-name"><?php echo $product['productname']; ?></td>
                        <td class="product-price">€<?php echo $product['price']; ?></td>
                        <td class="product-description"><?php echo $product['description']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="add_to_cart" value="<?php echo $product['id']; ?>"> <!-- Use product ID -->
                                <input type="submit" value="Add to Cart">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <footer>
        <!-- Your footer content here -->
        <?php include('footer.php'); ?>
    </footer>

</body>

</html>
