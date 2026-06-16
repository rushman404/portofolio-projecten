<?php
include "Classes/database.php";
include "Classes/product.php";

$id = $_GET["id"]; // Haal het product ID op uit de URL

// Zoek het product op basis van het ID
$product = Product::findId($id);

if (!$product) {
    // Als het product niet bestaat, redirect naar products.php met foutmelding
    header("location: products.php?error=Product niet gevonden");
    exit;
}

if (isset($_POST["productNaam"])) {
    // Als het formulier is verzonden, update de productgegevens

    $product->name = $_POST["productNaam"];
    $product->category = $_POST["productCategory"];
    $product->price = $_POST["productPrijs"];
    $product->instock = $_POST["productVoorraad"];

    $product->update(); // Werk product bij in de database

    // Redirect naar productenpagina met succesmelding
    header("Location: products.php?message=Product is bijgewerkt");
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
                <h4><strong>Aanpassen</strong></h4> 
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div> 
            <div class="col-2 text-center" id="blok">
                <form method="post"> <!-- Formulier om product te bewerken -->
                    <input type="text" id="product" name="productNaam" placeholder="Naam" value="<?= $product->name ?>" required><br><br> <!-- Product naam -->
                    <input type="text" id="product" name="productCategory" placeholder="Category" value="<?= $product->category ?>" required><br><br> <!-- Product categorie -->
                    <input type="text" id="product" name="productPrijs" placeholder="Prijs" value="<?= $product->price ?>" required><br><br> <!-- Product prijs -->
                    <input type="text" id="product" name="productVoorraad" placeholder="Voorraad" value="<?= $product->instock ?>" required><br><br> <!-- Voorraad -->
                    <input id="knopSend" type="submit" value="Verzenden"> <!-- Verzendknop -->
                </form>
            </div>
            <div class="col-5"></div> 
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
