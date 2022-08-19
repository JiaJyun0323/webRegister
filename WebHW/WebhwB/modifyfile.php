
    <?php
		session_start();	
        // print_r($_POST)
        $chfilename=$_POST['chfilename'];
        $target=$_POST['target'];
        $username=$_SESSION['username'];

		//$s=0;
        
        $link = mysqli_connect("localhost", "root", "", "webregister");
        $link -> set_charset("utf8");

        $result = $link -> query("update fileregistertable set filename='$chfilename' where username='$username' and filename='$target'");
        // if(file_exists("uploadfile/".$target)){
		// 	$s+=1;
		// }
		// else
		// 	$s+=2;
		rename("uploadfile/".$target,"uploadfile/".$chfilename);
		// if(file_exists("uploadfile/".$chfilename)){
		// 	$s+=4;
		// }
		// else
		// 	$s+=8;
		// echo $s;
        $link -> close();
		header("Location:filemanager.php"); 
    ?>
