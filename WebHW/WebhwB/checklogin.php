<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "", "webregister");
    $link -> set_charset("utf8");

    $username = $_POST['username'];
    $password = $_POST['password'];


    //echo json_encode($_POST);


    // 使用select的語法去尋找
    $result = $link -> query("select count(*) from webregistertable where username='$username' and password='$password'");
    $count = mysqli_fetch_row($result)[0];
    $link -> close();

    if ($count == 1) {
        header("Location:successlogin.php");
        $_SESSION['username'] = $username;
    } 
    else {
        echo '<script>alert("unknow username,password");window.location.href="login.php"</script>';
        // header("Location:login.php");
    }
?>