<?php
// Laad de database connectie
include "Classes/database.php";

// Controleer of het formulier is verzonden (productNaam bestaat in POST)
if (isset($_POST["productNaam"])) {
    // Laad de Product class
    include "Classes/product.php";

    // Maak een nieuw Product object aan
    $product = new Product();

    // Vul de eigenschappen van het product met data uit het formulier
    $product->name = $_POST["productNaam"];
    $product->category = $_POST["productCategory"];
    $product->price = $_POST["productPrijs"];
    $product->instock = $_POST["productVoorraad"];

    // Voeg het product toe aan de database
    $product->insert();

    // Redirect naar products.php met een succesbericht
    header("Location: products.php?message=Product is toegevoegd");
    exit();
}
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
        <div class="row mt-5">
            <div class="col text-end" style="padding-right: 40px;">
                <h4><strong>Toevoegen</strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2 text-center" id="blok">
                <form method="post">
                    <input type="text" id="product" name="productNaam" placeholder="Naam" required><br><br>
                    <input type="text" id="product" name="productCategory" placeholder="Category" required><br><br>
                    <input type="text" id="product" name="productPrijs" placeholder="Prijs" required><br><br>
                    <input type="text" id="product" name="productVoorraad" placeholder="Voorraad" required><br><br>
                    <input id="knopSend" type="submit" value="Verzenden">
                </form>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>