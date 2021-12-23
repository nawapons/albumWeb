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
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>


</head>

<body>
    <?php include("../include/navbar-user.php"); ?>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <b>รายการอัลบั้มรูปภาพ</b>
                <a href="albumadd.php" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> เพิ่มอัลบั้มรูปภาพ</a>
            </div>


            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr align="center">
                            <th>รหัสอัลบั้ม</th>
                            <th>รายการอัลบั้มรูปภาพ</th>
                            <th>รายละเอียด</th>
                            <th>สถานะ</th>
                            <th>เพิ่มรูปภาพ</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $album = $conn->query("SELECT * FROM albumname");
                            while ($row = $album->fetch()) { ?>
                                <tr>
                                    <td>
                                        <center><?php echo $row['an_id']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['an_name']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['an_detail']; ?></center>
                                    </td>
                                    <td>
                                        <center>
                                            <form action="function.php" method="post">
                                                <?php
                                                if ($row['an_status'] == "Y") { ?>
                                                    <a href="../controller/function.php?switchID=<?php echo $row['an_id']; ?>&status=Y"><img src="../asset/switch/on.png" alt="" width="50px"></a>
                                                <?php } else { ?>
                                                    <a href="../controller/function.php?switchID=<?php echo $row['an_id']; ?>&status=N"><img src="../asset/switch/off.png" alt="" width="50px"></a>
                                                <?php  }
                                                ?>
                                            </form>


                                        </center>
                                    </td>
                                    <td>
                                        <center><a href="albumpicture.php?an_id=<?php echo $row['an_id']; ?>"><i class="fas fa-plus-circle fa-lg" style="color:#FAA307"></i></a></center>
                                    </td>
                                    <td><a href="editalbum.php?an_id=<?php echo $row['an_id']; ?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit "></i></a>
                                        &nbsp;
                                        <a href="../controller/function.php?deletebumID=<?php echo $row['an_id']; ?>" onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่')" ; class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt" "></i></a>
                                </td>
                                </tr>
                        <?php  }
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    <?php include("../include/footer.php"); ?>
</body>

</html>