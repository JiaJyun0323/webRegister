<?php
    $act=$_POST['action'];
    $targetreply=$_POST['targetreply'];

    if($act =="delete"){
        $link = mysqli_connect("localhost", "root", "", "webregister");
        $link -> set_charset("utf8");
        $result = $link -> query("delete from replymessagetable where id='$targetreply'");
        $link -> close(); 
        //echo "delete";
        header("Location:reply.php"); 
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
        $result = $link -> query("update replymessagetable set content='$chcontent', date='$date' where id='$targetreply'");

        $link -> close(); 
        header("Location:reply.php"); 
        
    }

?>