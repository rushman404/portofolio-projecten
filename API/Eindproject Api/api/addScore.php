<?php
header("Content-Type: application/json");

include "../classes/database.php";
include "../classes/scores.php";
include "../classes/sessie.php";

if (!isset($_POST['sessionkey'], $_POST['score'])) {
    echo json_encode([
        "success" => false,
        "error" => "Data ontbreekt"
    ]);
    exit;
}

$sessionKey = $_POST['sessionkey'];
$scoreValue = $_POST['score'];

//valideer sessie
$sessie = sessie::vindActieveSessie($sessionKey);

if (!$sessie) {
    echo json_encode([
        "success" => false,
        "error" => "Ongeldige sessie"
    ]);
    exit;
}

//score toevoegen
$score = new Score();
$score->userId = $sessie->sessionUserId;
$score->value = $scoreValue;

if ($score->insert()) {
    echo json_encode([
        "success" => true,
        "message" => "Score opgeslagen"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Opslaan mislukt"
    ]);
}
