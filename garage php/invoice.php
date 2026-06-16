<?php
// Laad alle benodigde klassen in
include "Classes/database.php";
include "Classes/order.php";
include "Classes/customer.php";
include "Classes/orderLine.php";
include "Classes/product.php";

// Initialiseer variabelen
$order = null;
$klant = null;
$orderlines = [];
$foutmelding = null;

// Controleer of er een order-id is meegegeven via de URL
if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Zoek de bestelling op met dit ID
    $order = Order::findBestellingId($orderId);

    if ($order) {
        // Zoek bijhorende klant en orderregels op
        $klant = Customer::findKlantId($order->klantId);
        $orderlines = Orderline::findOrderId($orderId);
    } else {
        // Foutmelding als bestelling niet bestaat
        $foutmelding = "Bestelling niet gevonden.";
    }
} else {
    // Foutmelding als geen ID is opgegeven
    $foutmelding = "Geen order opgegeven.";
}
?>

<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Factuur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <li class="nav-item"><a class="nav-link" href="index.php">Klanten</a></li>
                            <li class="nav-item"><a class="nav-link" href="products.php">Producten</a></li>
                            <li class="nav-item"><a class="nav-link" id="active" href="orders.php">Bestellingen</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row mt-5">
            <div class="col">
                <?php if ($foutmelding): ?>
                    <!-- Toon foutmelding als die bestaat -->
                    <div class="alert alert-danger text-center">
                        <?= $foutmelding ?>
                    </div>
                <?php else: ?>
                    <!-- Toon factuurnummer -->
                    <h3><strong>Factuur #<?= $orderId ?></strong></h3>
                <?php endif; ?>
            </div>
            <div class="col text-end pe-4">
                <h4><strong>Factuur</strong></h4>
            </div>
        </div>
        <?php if (!$foutmelding): ?>
            <div class="row">
                <div class="col px-4">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4 mx-auto" id="blokje">
                            <h5 id="naam">Klantgegevens</h5>
                            <p class="p-3">
                                <!-- Toon klantgegevens -->
                                <?= $klant->firstname . " " . $klant->lastname ?><br>
                                <?= $klant->address ?><br>
                                <?= $klant->zipcode . " " . $klant->city ?><br>
                                <?= $klant->email ?><br>
                            </p>
                            <!--bestel datum tonen-->
                            <p id="onderkant">Datum: <?= $order->date ?></p>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col" id="tableBlok">
                            <h5 id="namen">Producten</h5>
                            <table class="table table-striped" id="factuurTabel">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Categorie</th>
                                        <th>Prijs</th>
                                        <th>Aantal</th>
                                        <th>Subtotaal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Bereken totaalbedrag en toon elke orderregel
                                    $totaal = 0;
                                    foreach ($orderlines as $line) {
                                        $product = Product::findId($line->productId);
                                        if ($product) {
                                            $subtotaal = $product->price * $line->quantity;
                                            $totaal += $subtotaal;
                                        }
                                    ?>
                                        <tr>
                                            <!-- Toon productgegevens -->
                                            <td><?= $product->name ?></td>
                                            <td><?=$product->category ?></td>
                                            <td>€<?= $product->price ?></td>
                                            <td><?= $line->quantity ?></td>
                                            <td>€<?= $subtotaal ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <!--totaal bedrag tonen -->
                                        <td colspan="4" class="text-end"><strong>Totaal</strong></td>
                                        <td><strong>€<?= $totaal ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Toon of de bestelling betaald is -->
                            <p id="onder"><strong>Betaald:</strong>
                                <?php
                                if ($order->paid == 1) {
                                    echo "Ja";
                                } else {
                                    echo "Nee";
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>