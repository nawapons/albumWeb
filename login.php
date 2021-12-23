<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <script src="asset/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>


</head>

<body>
    <?php include("include/navbar.php"); ?>
    <div class="container w-50 mt-4">
        <div class="card shadow">
            <div class="card-header " style="background-color: #e3f2fd;color: grey;">
                <b>:: Login : เข้าสู่ระบบ </b>
            </div>
            <div class="card-body">
                <form method="POST" action="controller/auth.php">
                    <br><input type="text" name="username" placeholder="ชื่อผู้ใช้งาน" class="form-control form-control-sm">
                    <br><input type="password" name="password" placeholder="รหัสผ่าน" class="form-control form-control-sm">
                    <br>
                    <center><button type="submit" name="Login" class="btn btn-primary">เข้าสู่ระบบ</button></center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>