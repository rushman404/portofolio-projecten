<?php
include "classes/User.php";
include "classes/sessie.php";
include "classes/database.php";

$error = "";

//inloggen
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $gebruiker = User::Login($username, $password);

    if (!$gebruiker) {
        $error = "Gebruikersnaam of wachtwoord onjuist.";
    } else if ($gebruiker->userAdmin != 1) {
        $error = "Geen admin rechten";
    } else {
        $key = md5(uniqid(rand(), true));

        $sessie = new Sessie();
        $sessie->sessionUserId = $gebruiker->id;
        $sessie->sessionKey = $key;
        $sessie->sessionStart = date("Y-m-d H:i:s");
        $sessie->sessionEnd = date("Y-m-d H:i:s", strtotime("+1 month"));
        $sessie->insert();

        //cookie maken
        setcookie("admin_session", $key, strtotime("+1 month"), "/");

        header("location: admin/gebruiker.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gebruiker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
</head>

<body id="body">
    <div class="container" id="blok">
        <div class="row">
            <div class="col" id="inputText">
                <form method="post">
                    <h1>Login</h1>
                    <?php
                    if (!empty($error)) {//foutmelding
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