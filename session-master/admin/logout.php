<?php
session_start(); //Dịch vụ bảo vệ
if (isset($_SESSION['loginOK'])) {
    unset($_SESSION['loginOK']);
    header("Location: ../index.php");
}
