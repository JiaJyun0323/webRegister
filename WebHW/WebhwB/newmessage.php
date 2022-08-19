<?php
    session_start();	
    $link = mysqli_connect("localhost", "root", "", "webregister");
    $link -> set_charset("utf8");

    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = gmdate('Y-m-d H:i:s',time()+3600*8);

    //echo $_POST;

    $result = $link -> query("insert into messageboardtable(username,title,content,date)value('$username', '$title', '$content', '$date')");
    //echo $result;
    $link -> close();
    header("Location:messageboard.php");
?>