<?php
    if ($_FILES['chfile']['error'] === UPLOAD_ERR_OK){
        session_start();
        $username=$_SESSION['username'];
        $chfile_name=$_FILES['chfile']['name'];
        $chfile_type=$_FILES['chfile']['type'];
        $chfile_size=$_FILES['chfile']['size'];
        $chfile_tempname=$_FILES['chfile']['tmp_name'];

        $toMB=round($chfile_size/1024000,2);
        $date = gmdate('Y-m-d H:i:s',time()+3600*8);
        move_uploaded_file($chfile_tempname,"uploadfile/".$chfile_name);

        $link = mysqli_connect("localhost", "root", "", "webregister");
        $link -> set_charset("utf8");


        $check = $link -> query("select count(*) from fileregistertable where username='$username' and filename='$chfile_name'");   
        $count = mysqli_fetch_row($check)[0];
        if ($count == 0){
            $result = $link -> query("insert into fileregistertable(username,filename,filesize,date)value('$username', '$chfile_name', '$toMB','$date');");
            echo '<script>alert("upload success");window.location.href="filemanager.php"</script>';
        }
        else{
            echo '<script>alert("error:upload repeat");window.location.href="filemanager.php"</script>'; 
        }


        
        //echo $date;            //08/10/2022 08:45:50 pm
        // echo $username ;     //co
        // echo $chfile_name;  //test.jpg
        // echo $chfile_type;      //image/jpeg
        // echo $toMB;             //0.11
        // echo $chfile_tempname;      //C:\xampp\tmp\phpC2AD.tmp
        // echo $chfile_size;      //114206

    }
    else{
        echo "upload error";
    }
?>