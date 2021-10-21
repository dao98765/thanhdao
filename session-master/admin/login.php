<?php
session_start();

if (isset($_POST['login'])) {
    $user_email = $_POST['userEmail'];
    $user_pass = $_POST['userPass'];

    //Mở kết nối
    include '../config.php';

    //Truy vấn
    $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_pass = '$user_pass'";
    $result = mysqli_query($conn, $sql);

    //Xác thực
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loginOK'] = $user_email;
        header("location: ./index.php");
    } else {
        header("location: ../index.php");
    }
}
