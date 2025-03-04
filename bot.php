<?php
$botToken = getenv("7363817048:AAGfMEmJMDjX-7eS9mRccRCJlcVvaZKjFuE");  // Render'dan tokenni olish
$apiURL = "https://api.telegram.org/bot$botToken";

// Kiruvchi ma'lumotni olish
$update = json_decode(file_get_contents("php://input"), TRUE);

// DEBUG: Kiruvchi ma'lumotni tekshirish
file_put_contents("log.txt", print_r($update, true)); // Log faylga yozish

// Ma'lumotlar mavjudligini tekshirish
if (isset($update["message"])) {
    $chatId = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];
    
    // Foydalanuvchiga javob yuborish
    $responseText = ($message == "/start") ? "Assalomu alaykum! PHP bot ishga tushdi." : "Siz yozdingiz: $message";

    file_get_contents($apiURL . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($responseText));
} else {
    // Xato bo'lsa, logga yozamiz
    file_put_contents("log.txt", "Xatolik: Telegramdan hech qanday ma'lumot kelmadi!", FILE_APPEND);
}
?>
