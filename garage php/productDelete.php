<?php
// Laad de database connectie en Product class
include "Classes/database.php";
include "Classes/product.php";

// Haal het product-ID op uit de URL (GET-parameter)
$id = $_GET["id"];

// Zoek het product op basis van het ID
$product = Product::findId($id);

// Als het product niet bestaat, redirect naar products.php met een foutmelding
if ($product == null) {
    header("Location: products.php?error=Product+niet+gevonden");
    exit;
}

// Verwijder het product uit de database
$product->delete();

// Redirect terug naar products.php met een succesbericht
header("Location: products.php?message=Product+verwijderd");
exit;
?>
