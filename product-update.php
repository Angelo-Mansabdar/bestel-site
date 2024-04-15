<?php
include("connections.php");


$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];

$stmt = $conn->prepare("UPDATE products SET productname = :product_name, description = :description, price = :price WHERE id = :product_id");
$stmt->bindParam(':product_name', $product_name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':product_id', $product_id);

try {
    $test = $stmt->execute();
    echo "Product toegevoegt!";
    var_dump($test);
    if ($test) {
        header("Location: admin-pagina.php");
    }
} catch (PDOException $e) {
    echo "Fout bij updaten van product: " . $e->getMessage();
}

// Sluit de verbinding
$conn = null;
