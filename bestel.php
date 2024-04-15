<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>Bestellen</title>
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
    include('cart.php');
    ?>

    <main>

    <form id="search-form" action="search.php" method="GET">
            <input id="search" name="search" type="text" placeholder="Zoeken">
            <input class="button" id="submit" type="submit" value="Zoek">
        </form>

        <div id="search-results">
            <!-- Hier worden de zoekresultaten weergegeven -->
        </div>

            <?php
            if (!empty($_SESSION['cart'])) {
                echo "<h3>Shopping Cart</h3>";
                echo "<ul>";
                $totalPrice = 0;
                foreach ($_SESSION['cart'] as $index => $product) {
                    echo "<li>{$product['productname']} - Quantity: {$product['quantity']} - Total: €" . ($product['price'] * $product['quantity']) . " <form method='post'><input type='hidden' name='remove_from_cart' value='$index'><input type='submit' value='Remove'></form></li>";
                    $totalPrice += ($product['price'] * $product['quantity']);
                }
                echo "<li class='li-margin'><strong>Total Price:</strong> €$totalPrice</li>";
                echo "</ul>";
            } else {
                echo "<h3>Shopping Cart</h3>";
                echo "<p>Your shopping cart is empty.</p>";
            }
            ?>
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
                                    <input type="hidden" name="add_to_cart" value="<?php echo $index; ?>">
                                    <input type="submit" value="Add to Cart">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </main>

    <footer>
        <?php include('footer.php'); ?>
    </footer>

</body>

</html>
