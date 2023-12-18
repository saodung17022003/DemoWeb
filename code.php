<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $passwordFirstAttempt = $_POST["passwordFirstAttempt"];
    $passwordSecondAttempt = $_POST["passwordSecondAttempt"];

    // Xử lý dữ liệu ở đây
    // Ví dụ:
    echo "Password from first attempt: " . $passwordFirstAttempt . "<br>";
    echo "Password from second attempt: " . $passwordSecondAttempt;
} else {
    echo "Invalid request method.";
}
?>
