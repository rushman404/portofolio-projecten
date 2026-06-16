<?php
include "../classes/database.php";
include "../classes/User.php";
include "../classes/sessie.php";

//check sessie
$sessieKey = $_COOKIE["admin_session"] ?? null;

$sessie = sessie::vindActieveSessie($sessieKey);

if (!$sessie) {
    header("Location: ../index.php");
    exit;
}

$gebruikers = User::findAllUsers();
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
                                <a class="nav-link" href="highscores.php">Highscores</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-5 mt-3 text-center">
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
            <div class="col text-end" style="padding-right: 40px;">
                <a href="gebruikerAdd.php" class="btn" id="knop">Toevoegen</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="tabel" border="1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Admin</th>
                            <th>Aanpassen</th>
                            <th>Verwijder</th>
                            <th>Scores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gebruikers as $gebruiker): ?>
                            <tr>
                                <td><?= $gebruiker->firstname ?></td>
                                <td><?= $gebruiker->lastname ?></td>
                                <td><?= $gebruiker->email ?></td>
                                <td><?= $gebruiker->username ?></td>
                                <td><?= $gebruiker->userAdmin == 1 ? "Ja" : "Nee" ?></td>
                                <td>
                                    <a href="gebruikerEdit.php?id=<?= $gebruiker->id; ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="gebruikerDelete.php?id=<?= $gebruiker->id ?>" onclick="return confirm('Weet je zeker?')">
                                        <i class="bi bi-person-x"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="score.php?id=<?= $gebruiker->id ?>">
                                        <i class="bi bi-trophy-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>