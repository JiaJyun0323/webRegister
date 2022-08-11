<?php    			
    $link = mysqli_connect("localhost", "root", "", "webregister") or die("Error with webregister db connection!");
	$link -> set_charset("utf8");

    session_start();

    echo $_SESSION['username'];
    echo $_POST['targetFile'];

    $link -> close();
?>	