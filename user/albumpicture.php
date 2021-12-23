<?php
require_once '../connect.php';
$an_id = $_GET["an_id"];

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
    <link href="../asset/lightbox/src/css/lightbox.css" rel="stylesheet" />
    <script src="../asset/lightbox/src/js/lightbox.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>


</head>



<body>
<?php include("../include/navbar-user.php"); ?>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <b>รายการอัลบั้มรูปภาพ</b>&nbsp;
                <a href="picture_add.php?an_id=<?php echo $an_id; ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> เพิ่มอัลบั้มรูปภาพ</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $count = 0;
                    try {
                        $picture = $conn->prepare("SELECT * FROM picture where an_id = ?");
                        $picture->execute([$an_id]);
                        while ($row = $picture->fetch()) { ?>
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body gallery">
                                        <a href="../picture/<?php echo "$row[pic_name]"; ?>" data-lightbox="roadtrip"><img class="card-img-top"  style="width:100%" src="<?php echo "../picture/$row[pic_name]"; ?>"></a>
                            
                                        <h5 class="card-title"><?php echo $row['pic_name']; ?>
                                            <a onclick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่')" ; href="../controller/function.php?PID=<?php echo $row['pic_id']; ?>&albumID=<?php echo $an_id; ?>"><i class="fas fa-trash" style="float:right;"></i></a>
                                        </h5>
                                    </div>
                                </div>
                                <div id="fullpage" onclick="this.style.display='none';"></div>
                            </div>
                            <?php
                            $count++;
                            if ($count == 4) {
                                $count = 0;
                            ?>

                </div><br>
                <div class="row">
        <?php  }
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
        ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br><br>
    <?php include("../include/footer.php"); ?>
</body>

</html>