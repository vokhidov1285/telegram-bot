<?php
$botToken = getenv("7363817048:AAGfMEmJMDjX-7eS9mRccRCJlcVvaZKjFuE");  // Render’dagi Environment Variable dan tokenni olamiz
$apiURL = "https://api.telegram.org/bot$botToken";

$update = json_decode(file_get_contents("php://input"), TRUE);
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if ($message == "/start") {
    $responseText = "Assalomu alaykum! PHP bot ishga tushdi.";
} else {
    $responseText = "Siz yozdingiz: $message";
}

file_get_contents($apiURL . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($responseText));
?>