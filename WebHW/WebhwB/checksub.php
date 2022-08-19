<?php
    function go_subscribe($is_subscribe)
    {
        //==1是給從選單進入者判斷  subscribe為按subscribe鈕的判斷
        if($is_subscribe == 1 || $is_subscribe == "subscribe"){
            header("Location:issubscribe.php");
            //$update = $link -> query("update webregistertable set subscribe='$subscribe' WHERE username='$username'");
        }else{
            header("Location:subscribe.php");
            //$update = $link -> query("update webregistertable set subscribe='$subscribe' WHERE username='$username'");
        }
    }

    session_start();
    $link = mysqli_connect("localhost", "root", "", "webregister");
    $link -> set_charset("utf8");
    
    $username = $_SESSION['username'];
    $result = $link -> query("select subscribe='subscribe' FROM webregistertable WHERE username='$username'");
    $count = mysqli_fetch_row($result)[0];


    //從選單進入 subscribe值為空(!array_key_exit) 則執行此
    if (!array_key_exists('subscribe', $_POST))
    {
        go_subscribe($count);       //如有訂閱則count=1 無=0
        exit(0);
    }

    $subscribe = $_POST['subscribe'];
    // echo json_encode($_SESSION);
    // echo json_encode($_POST);
    // if($subscribe!="subscribe"&&$subscribe!="unsubscribe"){
    //     exit(0);  
    // }
    // echo $subscribe;

    $update = $link -> query("update webregistertable set subscribe='$subscribe' WHERE username='$username'");
    
    // $count = mysqli_fetch_row($result)[0];
    // echo $count;
    go_subscribe($subscribe);


    // if($count == 1){
    //     header("Location:issubscribe.php");
    //     //$update = $link -> query("update webregistertable set subscribe='$subscribe' WHERE username='$username'");
    // }else{
    //     header("Location:subscribe.php");
    //     //$update = $link -> query("update webregistertable set subscribe='$subscribe' WHERE username='$username'");
    // }

    //header("Location:issubscribe.php");
    $link -> close();
?>