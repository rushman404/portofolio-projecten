<?php
// Laad de database- en klantklassen in
include "Classes/database.php";
include "Classes/customer.php";

// Haalt alle klanten op uit de database en slaat ze op in een array
$klanten = Customer::haalKlantenOp();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klanten overzicht</title>
    <link rel="icon" type="CSS/x-icon" href="CSS/logo.ico">
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
                                <a class="nav-link" id="active" href="index.php">Klanten</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.php">Producten</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.php">Bestellingen</a>
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
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Adres</th>
                            <th>Postcode</th>
                            <th>Woonplaats</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($klanten as $klant): ?>
                            <!-- Loop door alle klanten en toon hun gegevens in een nieuwe rij -->
                            <tr>
                                <!-- Toon voornaam van de klant -->
                                <td><?= $klant->firstname ?></td>

                                <!-- Toon achternaam van de klant -->
                                <td><?= $klant->lastname ?></td>

                                <!-- Toon adres van de klant -->
                                <td><?= $klant->address ?></td>

                                <!-- Toon postcode van de klant -->
                                <td><?= $klant->zipcode ?></td>

                                <!-- Toon woonplaats van de klant -->
                                <td><?= $klant->city ?></td>

                                <!-- Toon e-mailadres van de klant -->
                                <td><?= $klant->email ?></td>
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