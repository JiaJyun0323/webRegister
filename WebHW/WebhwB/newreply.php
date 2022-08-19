<?php
    session_start();	
    $link = mysqli_connect("localhost", "root", "", "webregister");
    $link -> set_charset("utf8");

    $username = $_SESSION['username'];
    $replyid = $_SESSION['replytarget'];
    $reply = $_POST['reply'];
    $date = gmdate('Y-m-d H:i:s',time()+3600*8);

    //echo $_POST;

    $result = $link -> query("insert into replymessagetable(replyid,username,date,content)value('$replyid', '$username', '$date', '$reply')");
    //echo $result;
    $link -> close();
    header("Location:reply.php");
?>