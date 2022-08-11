<?php
    session_start();
    $nowuser = $_SESSION['username'] ;
    $link = mysqli_connect("localhost", "root", "", "webregister");
    $link -> set_charset("utf8");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $color = $_POST['color'];

    unset($_SESSION['username']);

    $_SESSION['username'] = $username;
    $result = $link -> query("update webregistertable set username='$username', password='$password', email='$email', gender='$gender', color='$color' WHERE username='$nowuser'");
    $link -> close();
    header("Location:modifydata.php");
?>