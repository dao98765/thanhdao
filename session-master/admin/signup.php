<h1 class="text-center success">Đăng Ký Tài Khoản</h1>
<?php
session_start();
include '../header.php'; ?>
<form action="./process_signup.php" method="POST"> <!--kết nối với process_signup-->
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" name="username"><!--Name ở đây để viết vào dong 5 bên processsign-->
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Địa chỉ email</label>
        <input type="email" class="form-control" name="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Mật khẩu</label>
        <input type="text" class="form-control" name="password" placeholder="abc123">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nhập Lại mật khẩu</label>
        <input type="text" class="form-control" name="re_password" placeholder="abc123">
    </div>
    <div class="mb-3">
        <button type="submit" name="signup" class="btn btn-primary">Đăng ký</button>
    </div>
</form>
<?php
include '../footer.php';
?>