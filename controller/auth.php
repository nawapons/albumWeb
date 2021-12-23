<?php 
    require_once '../connect.php';
    session_start();
    if(isset($_POST['Login'])){
        try{
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username == "" || $password == ""){
                echo "<script>alert('You cannot leave input blank!!!');window.location='login.php';</script>";
            }
            $login = $conn->prepare("SELECT * FROM user WHERE user_username = ?");
            $login->execute([$username]);
            $rowLogin=$login->fetch();
            if($rowCount=$login->rowCount() == 1){
                if($username == $rowLogin['user_username'] AND $password == $rowLogin['user_password']){
                    if($rowLogin['user_status'] == "ON"){
                        $_SESSION['username'] = $rowLogin['user_username'];
                        Header("refresh:0;url=../user/index.php");
                    }else{
                        echo "<script>alert('This user is banned , Please contact admin');window.location='../login.php';</script>";
                    }
                }else{
                    echo "<script>alert('Wrong username or password');window.location='../login.php';</script>";
                }
            }else{
                echo "<script>alert('No user..');window.location='../login.php';</script>";
            }
           
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if(isset($_GET['logout'])){
        session_destroy();
        Header("refresh:0;url=../index.php");
    }
?>