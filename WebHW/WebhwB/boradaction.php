<?php
    
    $act=$_POST['action'];
    $targetmessage=$_POST['targetmessage'];

    if($act =="delete"){
        $link = mysqli_connect("localhost", "root", "", "webregister");
        $link -> set_charset("utf8");
        $result = $link -> query("delete from messageboardtable where id='$targetmessage'");
        $result2 = $link -> query("delete from replymessagetable where replyid='$targetmessage'");
        $link -> close(); 
        header("Location:messageboard.php"); 
    }

    elseif($act =="edit"){
        $chtitle = $_POST['chtitle'];
        $chcontent = $_POST['chcontent'];
        $targetmessage=$_POST['targetmessage'];
        $date = gmdate('Y-m-d H:i:s',time()+3600*8);
        //echo $chtitle;
        //echo $chcontent;

        $link = mysqli_connect("localhost", "root", "", "webregister");
        $link -> set_charset("utf8");
        $result = $link -> query("update messageboardtable set title='$chtitle', content='$chcontent', date='$date' where id='$targetmessage'");

        $link -> close(); 
        header("Location:messageboard.php"); 
        
    }

?>