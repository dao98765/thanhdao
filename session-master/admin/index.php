<?php
session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['loginOK'])) {
    header("Location:../index.php");
}
?>
<?php
include '../header.php';

echo '<h2>Xin chào</h2>';
echo '<a class="btn btn-primary" href="logout.php">Thoát</a>';

?>

<?php include '../header.php'; ?>