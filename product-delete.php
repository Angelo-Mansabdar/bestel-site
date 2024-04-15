<?php
include("connections.php");

$product_id = $_POST['product_id'];

$stmt = $conn->prepare("DELETE FROM products WHERE id = :product_id");
$stmt->bindParam(':product_id', $product_id);

try {
    $test = $stmt->execute();
    echo "Product verwijdert!";
    var_dump($test);
    if ($test) {
        header("Location: admin-pagina.php");
    }
} catch (PDOException $e) {
    echo "Fout bij verwijderen van product: " . $e->getMessage();
}


$conn = null;
