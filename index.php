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
<style>
    .cuttext {
        overflow: hidden;
        white-space: nowrap;
        /* Don't forget this one */
        text-overflow: ellipsis;
    }
</style>

<body>
    <?php include("include/navbar.php"); ?>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <b>ประมวลภาพกิจกรรม</b>
            </div>
            <div class="card-body">
                <div class="row">

                    <?php
                    try {
                        $show = $conn->query("SELECT * FROM albumname");
                        while ($row = $show->fetch()) {
                            $an_id = $row['an_id'];
                            $an_name = $row['an_name'];
                            $an_detail = $row['an_detail'];
                            $an_status = $row['an_status'];
                            $picture = $conn->prepare("SELECT * FROM picture WHERE an_id = ? LIMIT 1");
                            $picture->execute([$an_id]);
                            $picrow = $picture->fetch();
                            if ($an_status == "Y") { ?>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <img <?php
                                                if ($count = $picture->rowCount() > 0) { ?> src="picture/<?php echo $picrow['pic_name']; ?>" <?php } else { ?> src="asset/noimage/noimage.png" <?php  }
                                                                                                                                                                                                ?> class="card-img-top" height="200" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $an_name; ?></h5>
                                            <p class="card-text cuttext"><?php echo $an_detail; ?></p>
                                            <a href="viewpicture.php?album=<?php echo $an_id; ?>" class="btn btn-primary">ดูรูปภาพทั้งหมด</a>
                                        </div>
                                    </div>
                                </div>
                    <?php }
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <?php include("include/footer.php"); ?>
</body>

</html>