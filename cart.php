<?php
    include('connections.php');

    // Function to add a product to the cart
    function addToCart($product) {
        // Check if the product already exists in the cart
        $found = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['productname'] === $product['productname']) {
                // Increment quantity
                $cartItem['quantity']++;
                $found = true;
                break;
            }
        }
        // If not found, add a new entry
        if (!$found) {
            $product['quantity'] = 1;
            $_SESSION['cart'][] = $product;
        }
    }

    // Function to remove a product from the cart
    function removeFromCart($index) {
        unset($_SESSION['cart'][$index]);
    }

    // Dummy product data for demonstration
    $products = array();
    
    // Query to fetch products from the database
    $sql = "SELECT * FROM products";
    $stmt = $conn->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $row;
    }

    // Check if a product is added to the cart
    if (isset($_POST['add_to_cart'])) {
        $index = $_POST['add_to_cart'];
        addToCart($products[$index]);
    }

    // Check if a product is removed from the cart
    if (isset($_POST['remove_from_cart'])) {
        $index = $_POST['remove_from_cart'];
        removeFromCart($index);
    }