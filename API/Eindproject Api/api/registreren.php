<?php
header("Content-Type: application/json");

include "../classes/database.php";
include "../classes/User.php";
include "../classes/sessie.php";

// Check of alle velden ingevuld zijn
if (!isset($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["username"], $_POST["password"])) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "error" => "Niet alle velden zijn ingevuld"
    ]);
    exit;
}
try {
    //gebruiker toevoegen
    $user = new User();
    $user->firstname = $_POST["firstname"];
    $user->lastname = $_POST["lastname"];
    $user->email = $_POST["email"];
    $user->username = $_POST["username"];
    $user->password = $_POST["password"];
    $user->userAdmin = "0";

    $result = $user->insert();

    if ($result) {
        //sessie aanmaken
        $key = md5(uniqid(rand(), true));

        $sessie = new Sessie();
        $sessie->sessionUserId = $user->id;
        $sessie->sessionKey = $key;
        $sessie->sessionStart = date("Y-m-d H:i:s");
        $sessie->sessionEnd = date("Y-m-d H:i:s", strtotime("+1 month"));
        $sessie->insert();

        echo json_encode([
            "success" => true,
            "message" => "Account aangemaakt!",
            "sessionKey" => $key
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Account aanmaken mislukt"
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "Server fout"
    ]);
}
