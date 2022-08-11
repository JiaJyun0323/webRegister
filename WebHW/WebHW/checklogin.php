<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "", "webregister");
    $link -> set_charset("utf8");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    //echo json_encode($_POST);


    // 使用select的語法去尋找
    $result = $link -> query("select count(*) from webregistertable where username='$username' and password='$password' and email='$email' and gender='$gender'");
    $count = mysqli_fetch_row($result)[0];
    $link -> close();

    if ($count == 1) {

        $_SESSION['username'] = $username;
        header("Location:successlogin.php");

    } else {
        echo '<script>alert("unknow username,password,email or gender");window.location.href="login.php"</script>';
        // header("Location:login.php");
    }
?>