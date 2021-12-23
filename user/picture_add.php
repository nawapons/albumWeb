<?php
require_once '../connect.php';
$an_id = $_GET['an_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <script src="../asset/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="../asset/js/bootstrap.min.js"></script>


</head>

<body>
   <?php include("../include/navbar-user.php"); ?>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <b>อัลบั้มรูปภาพ</b>&nbsp;
            </div>
            <div class="card-body">
                <form action="picturesave.php" method="post" enctype="multipart/form-data">
                    กรุณาเลือกไฟล์ที่ต้องการอัพโหลด
                    <input type="file" name="fileUpload[]" multiple="multiple">
                    <input type="hidden" name="an_id" value="<?php echo $an_id; ?>">
                    <input type="submit" value="ตกลง" class="btn btn-outline-primary btn-sm">
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <?php include("../include/footer.php"); ?>
</body>

</html>