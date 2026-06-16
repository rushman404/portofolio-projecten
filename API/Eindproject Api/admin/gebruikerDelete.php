<?php
include "../classes/database.php";
include "../classes/User.php";
include "../classes/sessie.php";

$id = $_GET["id"];
$user = User::findByID($id);

if (!$user) {
    header("location: gebruiker.php?error=user niet gevonden");
    exit;
}

$user->delete();

header("location: gebruiker.php?error=user verwijderd");
exit;
