<!--bên này nhận dl từ form--> 
<?php
include '../header.php';
session_start();
if (isset($_POST['signup'])) {// ktra xem đã nhấn button ki chưa, nếu r thì tiến hàng bắt giá trị từ csdl
    $user_name = $_POST['username'];
    $user_pass = $_POST['password'];
    $user_repass = $_POST['re_password'];
    $user_email = $_POST['email'];
} else {
    echo 'sai';
}
//Kết nối csdl
include '../config.php';
//Truy vấn dl
$sql = "SELECT * FROM users where user_email ='$user_email'";
$result = mysqli_query($conn, $sql);
//Xử lí kết quả 
if (mysqli_num_rows($result) > 0) {
    echo "Email đã tồn tại vui lòng thử lại<br>";
    echo '<a class="btn btn-primary" href="../admin/signup.php">Quay lại trang đăng ký</a>';
} else {
    $pass_hash = password_hash($user_pass, PASSWORD_DEFAULT);

    //Nếu chưa tồn tại cta mới lưu vào csdl và gửi email
    $sql = "INSERT INTO users (user_name, user_email, user_pass) VALUES ('$user_name','$user_email', '$pass_hash')";
    $result = mysqli_query($conn, $sql);
    if ($result > 0) {
        $_SESSION['signupOK'] = $user_email;
        header('location:../mail/index.php?email=' . $user_email . '&name=' . $user_name . '&pass=' . $user_pass);
    } else {
        echo "lỗi sql";
    }
   
}
mysqli_close($conn);

include '../footer.php';
