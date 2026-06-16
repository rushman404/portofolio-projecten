<?php
include "Classes/database.php"; // Database verbinding includen
include "Classes/product.php"; // Product klasse includen

$producten = Product::findAll(); // Alle producten ophalen uit de database
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klanten overzicht</title>
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
                                <a class="nav-link" id="active" href="products.php">Producten</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.php">Bestellingen</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <?php if (isset($_GET["message"])): ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($_GET["message"]) ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET["error"])): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($_GET["error"]) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col text-end" style="padding-right: 40px;">
                <a href="productAdd.php" class="btn" id="knop">Toevoegen</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="tabel" border="1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Naam product</th>
                            <th>Categorie</th>
                            <th>Prijs</th>
                            <th>Stock</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($producten as $product): ?>
                            <!-- Loop door alle producten en toon ze in de tabel -->
                            <tr>
                                <td><?= $product->name ?></td> <!-- Productnaam -->
                                <td><?= $product->category ?></td> <!-- Productcategorie -->
                                <td><?= $product->price ?></td> <!-- Productprijs -->
                                <td><?= $product->instock ?></td> <!-- Voorraad -->
                                <td>
                                    <!-- Link om product aan te passen -->
                                    <a href="productEdit.php?id=<?= $product->id; ?>" class="btn btn-dark" id="knop">Aanpassen</a>
                                    <!-- Link om product te verwijderen, met bevestiging -->
                                    <a href="productDelete.php?id=<?= $product->id; ?>" class="btn btn-dark" id="knop"
                                        onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">Verwijderen</a>
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