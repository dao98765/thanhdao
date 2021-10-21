<?php
include './header.php';
?>
<form action="./admin/login.php" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="userEmail">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="userPass">
    </div>
    <div class="mb-3">
        <button type="submit" name="login" class="btn btn-primary">Sign In</button>
        <a href="./admin/signup.php" class="btn btn-primary">Sign Up</a>
    </div>
</form>
<?php include './footer.php'; ?>