<?php
require_once '../connect.php';
$an_id = $_GET["an_id"];
try {
    $data = $conn->prepare("SELECT * FROM albumname WHERE an_id = ?");
    $data->execute([$an_id]);
    $row = $data->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}
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
            <div class="card-header bg-info text-white">
                แก้ไขอัลบั้ม
            </div>
            <div class="card-body">
                <form action="../controller/function.php" method="POST">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['an_id']; ?>" readonly>
                    <div class="form-group">
                        <label for="albumname">ชื่ออัลบั้ม</label>
                        <input id="albumname" class="form-control" value="<?php echo $row['an_name']; ?>" type="text" name="albumname">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="detail">รายละเอียด</label>
                        <textarea name="detail" cols="30" rows="10" class="form-control"><?php echo $row['an_detail']; ?></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-success" name="editAlbum">บันทึกการแก้ไข</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>