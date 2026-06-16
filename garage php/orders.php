<?php
// Laad de vereiste klassen
include "Classes/database.php";
include "Classes/order.php";

// Haal alle bestellingen op via de statische methode
$orders = Order::haalBestellingOp();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klanten overzicht</title>
    <link rel="icon" type="CSS/x-icon" href="CSS/logo.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row" id="titel">
            <div class="col text-center">
                <h1><strong>Rusteze admin</strong></h1>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-expand-lg" id="kleurNav">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Klanten</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.php">Producten</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="active" href="orders.php">Bestellingen</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col">
                <table id="tabel" border="1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Klant id</th>
                            <th>Datum</th>
                            <th>Betaal</th>
                            <th>Factuur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <!-- Toon order ID -->
                                <td><?= $order->id ?></td>
                                <!-- Toon klant ID gekoppeld aan de bestelling -->
                                <td><?= $order->klantId ?></td>
                                <!-- Toon besteldatum -->
                                <td><?= $order->date ?></td>
                                <!-- Toon of de bestelling betaald is (1 = Ja, anders Nee) -->
                                <td><?= $order->paid == 1 ? "Ja" : "Nee" ?></td>
                                <!-- Link naar factuurpagina met order ID in de URL -->
                                <td>
                                    <a href="invoice.php?id=<?= $order->id; ?>">
                                        <i class="bi bi-file-earmark factuur-icon"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>