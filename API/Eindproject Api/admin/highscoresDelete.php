<?php
include "../classes/database.php";
include "../classes/scores.php";
include "../classes/sessie.php";

$id = $_GET["id"];
$score = Score::findById($id);

if (!$score) {
    header("location: highscores.php?error=score niet gevonden");
    exit;
}

$score->delete();

header("location: highscores.php?error=score verwijderd");
exit;
