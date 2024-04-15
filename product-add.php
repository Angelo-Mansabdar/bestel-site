<?php
include("connections.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de waarden op van het formulier
    $productnaam = $_POST['productname'];
    $omschrijving = $_POST['description'];
    $prijs = $_POST['price'];

    // Voeg het product toe aan de database
    $stmt = $conn->prepare("INSERT INTO products (productname, description, price) VALUES (:productname, :description, :price)");
    $stmt->bindParam(':productname', $productnaam);
    $stmt->bindParam(':description', $omschrijving);
    $stmt->bindParam(':price', $prijs);

    // Probeer het toevoegen uit te voeren
    try {
        $test = $stmt->execute();
        echo "Product toegevoegt!";
        var_dump($test);
        if ($test) {
            header("Location: admin-pagina.php");
        }
    } catch (PDOException $e) {
        echo "Fout bij toevoegen van product: " . $e->getMessage();
    }
}