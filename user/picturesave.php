<?php
require_once '../connect.php';

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
</body>
<div class="container">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <b>อัลบั้มรูปภาพ</b>
        </div>
        <div class="card-body">
            <?php
            $an_id = $_POST['an_id'];
            if (isset($_FILES["fileUpload"])) {
                $no = 1;
                echo "<center><h3> รายการรูปภาพที่อัพโหลด</h3></center><hr>";
                try {
                    foreach ($_FILES['fileUpload']['tmp_name'] as $key => $val) {
                        $name = $_FILES['fileUpload']['name'][$key];
                        $size = $_FILES['fileUpload']['size'][$key];
                        $tmp = $_FILES['fileUpload']['tmp_name'][$key];
                        $type = $_FILES['fileUpload']['type'][$key];
                        $file_name = $an_id . "_" . $name;
                        move_uploaded_file($tmp, "../picture/" . $file_name);
                        $upload = $conn->prepare("INSERT INTO picture VALUES (NULL,?,?)");
                        if ($upload->execute([$file_name, $an_id])) {
                            echo "<br> $no) $file_name -----> Upload OK ";
                        } else {
                            echo "<br> $no) $file_name -----> Upload ERROR !!!!!!";
                        }
                        $no++;
                    }
                    $no--;
                    echo "<hr><center> จำนวนไฟล์ที่อัพโหลด : $no ไฟล์ <br><br><br>
                    <a href='albumpicture.php?an_id=$an_id' class='btn btn-outline-primary btn-sm'> กลับหน้าหลัก</a></center>
                    <meta http-equiv='refresh' content='0;url=albumpicture.php?an_id=$an_id'>";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            ?>
        </div>
    </div>
</div>
<br><br>
<?php include("../include/footer.php"); ?>

</html>