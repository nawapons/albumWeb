<?php 
    require_once '../connect.php';
    session_start();
    if(isset($_POST['addAlbum'])){
        $name = $_POST['albumname'];
        $detail = $_POST['detail'];
        if($name == "" || $detail == ""){
            echo "<script>alert('กรอกข้อมูลให้ครบ');window.location='../user/albumadd.php';</script>";
        }else{
            try{
                $insert = $conn->prepare("INSERT INTO albumname VALUES (NULL,?,?,?)");
                if($insert->execute([$name,$detail,'Y'])){
                    echo "<script>alert('เพิ่มอัลบั้มสำเร็จ');window.location='../user/albumname.php';</script>";
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
    if(isset($_GET['switchID'])){
        try{
            $AID = $_GET['switchID'];
            $status =$_GET['status'];
            if($status == "Y"){
                $close = $conn->prepare("UPDATE albumname SET an_status = 'N' WHERE an_id = ?");
                if($close->execute([$AID])){
                    echo "<script>alert('แก้ไขสถานะ');window.location='../user/albumname.php';</script>";
                }
            }else{
                $open = $conn->prepare("UPDATE albumname SET an_status = 'Y' WHERE an_id = ?");
                if($open->execute([$AID])){
                    echo "<script>alert('แก้ไขสถานะ');window.location='../user/albumname.php';</script>";
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }
    if(isset($_GET['PID'])){
        try{
            $PID = $_GET['PID'];
            $albumID = $_GET['albumID'];
            $selectPIC = $conn->prepare("SELECT * FROM picture WHERE pic_id = ?");
            $selectPIC->execute([$PID]);
            $row=$selectPIC->fetch();
            if($row['pic_name']!=""){
                @unlink("../picture/$row[pic_name]");
            }
            $del = $conn->prepare("DELETE FROM picture WHERE pic_id = ?");
            if($del->execute([$PID])){
                echo "<script>alert('ลบรูปภาพสำเร็จ');window.location='../user/albumpicture.php?an_id=$albumID';</script>";
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if(isset($_GET['deletebumID'])){
        try{
            $AID = $_GET['deletebumID'];
            $selectPIC = $conn->prepare("SELECT * FROM picture WHERE an_id = ?");
            $selectPIC->execute([$AID]);
            while($row=$selectPIC->fetch()){
                $picname=$row['pic_name'];
                unlink("../picture/$picname");
            }
            $delalbum = $conn->prepare("DELETE FROM albumname WHERE an_id = ?");
            if($delalbum->execute([$AID])){
                $delpicture = $conn->prepare("DELETE FROM picture WHERE an_id = ?");
                if($delpicture->execute([$AID])){
                    echo "<script>alert('ลบอัลบั้มสำเร็จ');window.location='../user/albumname.php';</script>";
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if(isset($_POST['editAlbum'])){
        $name = $_POST['albumname'];
        $detail = $_POST['detail']; 
        $id = $_POST['id'];
        if($name == "" || $detail == ""){
            echo "<script>alert('กรอกข้อมูลให้ครบ');window.location='../user/editalbum.php';</script>";
        }else{
            try{
                $insert = $conn->prepare("UPDATE albumname SET an_name = ?,an_detail = ? WHERE an_id = ?");
                if($insert->execute([$name,$detail,$id])){
                    echo "<script>alert('แก้ไขสำเร็จ');window.location='../user/albumname.php';</script>";
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
