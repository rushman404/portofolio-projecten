<?php
header("Content-Type: application/json");

include "../classes/database.php";
include "../classes/scores.php";
include "../classes/sessie.php";

if (!isset($_POST['sessionkey'])) {
    echo json_encode([
        "success" => false,
        "error" => "Sessionkey ontbreekt"
    ]);
    exit;
}

//valideer sessie
$sessionKey = $_POST['sessionkey'];
$sessie = sessie::vindActieveSessie($sessionKey);

if (!$sessie) {
    echo json_encode([
        "success" => false,
        "error" => "Ongeldige sessie"
    ]);
    exit;
}

$topScore = Score::top10();

echo json_encode([
    "success" => true,
    "topScores" => $topScore
]);