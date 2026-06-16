<?php
header("Content-Type: application/json");

include "../classes/database.php";
include "../classes/User.php";
include "../classes/sessie.php";

if (!isset($_POST['username'], $_POST['password'])) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "error" => "vul alle velden in"
    ]);
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

try {
    //check gegevens en maak sessie aan
    $user = User::Login($username, $password);
    if ($user) {
        $key = md5(uniqid(rand(), true));
        $sessie = new Sessie();
        $sessie->sessionUserId = $user->id;
        $sessie->sessionKey = $key;
        $sessie->sessionStart = date("Y-m-d H:i:s");
        $sessie->sessionEnd = date("Y-m-d H:i:s", strtotime("+1 month"));
        $sessie->insert();

        echo json_encode([
            "success" => true,
            "user" => [
                "id" => $user->id,
                "firstname" => $user->firstname,
                "lastname" => $user->lastname,
                "username" => $user->username,
                "email" => $user->email,
                "userAdmin" => $user->userAdmin,
                "sessionKey" => $sessie->sessionKey
            ]
        ]);
    } else {
        http_response_code(401);
        echo json_encode([
            "success" => false,
            "error" => "Gebruikernaam of Wachtwoord incorrect"
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "Serverfout: " . $e->getMessage()
    ]);
}
