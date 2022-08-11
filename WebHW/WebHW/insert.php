<?php
    $link = mysqli_connect("localhost", "root", "", "webregister");
    $link -> set_charset("utf8");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $color = $_POST['color'];

    $result = $link -> query("insert into webregistertable(username,password,email,gender,color)value('$username', '$password', '$email', '$gender', '$color');");
    echo $result;
    $link -> close();
    header("Location:login.php");
?>