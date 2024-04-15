<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>Berichten</title>
</head>

<body>

    <?php
    include('connections.php');
    session_start();
    $query = "SELECT * FROM messages ORDER BY datum_tijd DESC";
    $statement = $conn->query($query);
    $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
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
            <table class="product-table admin-margin">
                <thead>
                    <tr>
                        <th class="product-name">ID</th>
                        <th class="product-price">Naam</th>
                        <th class="product-description">E-mail</th>
                        <th>Bericht</th>
                        <th class="product-price">Datum/Tijd</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message) : ?>
                        <tr>
                            <td class="product-name"><?php echo htmlspecialchars($message['id']); ?></td>
                            <td class="product-price"><?php echo htmlspecialchars($message['naam']); ?></td>
                            <td class="product-description"><?php echo htmlspecialchars($message['email']); ?></td>
                            <td><?php echo htmlspecialchars($message['bericht']); ?></td>
                            <td class="product-price"><?php echo htmlspecialchars($message['datum_tijd']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
        
        <?php
        include('footer.php');
        ?>

</body>
</html>
<?php
    }
