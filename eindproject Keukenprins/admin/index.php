<?php
// Klassen includen voor gebruiker, sessie en database
include "../classes/gebruiker.php";
include "../classes/sessie.php";
include "../classes/database.php";

$error = "";

// Check of formulier is verzonden met gebruikersnaam
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Probeer gebruiker te vinden op basis van ingevoerde gegevens
    $gebruiker = Gebruiker::vindGebruiker($username, $password);

    if ($gebruiker) {
        // Unieke sessiesleutel genereren
        $key = md5(uniqid(rand(), true));

        // Nieuwe sessie aanmaken en vullen
        $sessie = new Sessie();
        $sessie->sessionUserId = $gebruiker->userId;
        $sessie->sessionKey = $key;
        $sessie->sessionStart = date("Y-m-d H:i:s");
        $sessie->sessionEnd = date("Y-m-d H:i:s", strtotime("+1 month"));
        $sessie->insert();

        // Cookie zetten voor sessie met geldigheid van 1 maand
        setcookie("keukenprins-session", $key, strtotime("+1 month"), "/");

        // Redirect afhankelijk van admin status
        if ($gebruiker->userAdmin == "1") {
            header("location: admin.php");
            exit();
        } else {
            header("location: ../index.php");
            exit();
        }
    } else
        // Foutmelding bij onjuiste inloggegevens
        $error = "Gebruikersnaam of wachtwoord onjuist probeer opnieuw.";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inlog pagina</title>
    <link rel="icon" type="image/x-icon" href="../images/password.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body id="body">
    <header class="text-center">
        <img src="../images/Daily-Bugle-Logo.png" alt="Logo" width="1536">
    </header>
    <div class="container" id="blok">
        <div class="row">
            <div class="col" id="inputText">
                <form method="post">
                    <h1>Login</h1>
                    <?php
                    if (!empty($error)) {
                        echo "<div class='error-box'>$error</div>";
                    }
                    ?>
                    <div class="mb-3 position-relative">
                        <input type="text" name="username" id="username" placeholder="Gebruikersnaam" required>
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="mb-3 position-relative">
                        <input type="password" name="password" id="password" placeholder="Wachtwoord" required>
                        <i class="bi bi-lock-fill"></i>
                    </div>
                    <input id="knop" type="submit" value="Inloggen">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>