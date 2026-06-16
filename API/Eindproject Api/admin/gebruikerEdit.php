<?php
include "../classes/database.php";
include "../classes/User.php";
include "../classes/sessie.php";

$sessieKey = $_COOKIE["admin_session"] ?? null;

$sessie = sessie::vindActieveSessie($sessieKey);

if (!$sessie) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET["id"];
$user = User::findByID($id);

if (!$user) {
    header("location: gebruiker.php?error=user niet gevonden");
    exit;
}

if (isset($_POST["voornaam"])) {

    $user->firstname = $_POST["voornaam"];
    $user->lastname = $_POST["achternaam"];
    $user->email = $_POST["email"];
    $user->username = $_POST["username"];
    $user->password = $_POST["password"];
    $user->userAdmin = $_POST["userAdmin"];

    $user->update();

    header("Location: gebruiker.php?message=User is bijgewerkt");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gebruiker</title>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row" id="titel">
            <div class="col text-center">
                <h1><strong>Tamagotichi admin</strong></h1>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-expand-lg" id="kleurNav">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" id="active" href="gebruiker.php">Gebruiker</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.php">Scores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.php">Bestellingen</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row mt-2">
            <div class="col text-end" style="padding-right: 40px;">
                <h4><strong>Aanpassen</strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="post">
                    <input type="text" id="user" name="voornaam" placeholder="Voornaam" value="<?= $user->firstname ?>" required><br><br>
                    <input type="text" id="user" name="achternaam" placeholder="Achternaam" value="<?= $user->lastname ?>" required><br><br>
                    <input type="text" id="user" name="email" placeholder="Email" value="<?= $user->email ?>" required><br><br>
                    <input type="text" id="user" name="username" placeholder="Username" value="<?= $user->username ?>" required><br><br>
                    <input type="text" id="user" name="password" placeholder="Password" value="<?= $user->password ?>" required><br><br>
                    <select name="userAdmin" id="userAdmin" required>
                        <option value="0" <?= $user->userAdmin == "0" ? "selected" : "" ?>>Gebruiker</option>
                        <option value="1" <?= $user->userAdmin == "1" ? "selected" : "" ?>>Admin</option>
                    </select>
                    <input id="knopSend" type="submit" value="Verzenden">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>