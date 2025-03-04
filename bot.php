<?php
$token = " 7363817048:AAE9qXR63IQN_FlK3qIJ-jr7KOK6Oj7W614";
$api_url = "https://api.telegram.org/bot$token/";

$update = json_decode(file_get_contents("php://input"), true);

if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];

    if ($text == "/start") {
        sendMessage($chat_id, "Assalomu alaykum! Bot Render serverida ishlayapti.");
    } else {
        sendMessage($chat_id, "Siz yozdingiz: " . $text);
    }
}

function sendMessage($chat_id, $message) {
    global $api_url;
    $url = $api_url . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($message);
    file_get_contents($url);
}
?>