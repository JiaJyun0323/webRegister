<?php
    
    $act=$_POST['action'];
    $targetFile=$_POST['targetFile'];

    if($act =="delete"){
        $link = mysqli_connect("localhost", "root", "", "webregister");
        $link -> set_charset("utf8");
        $result = $link -> query("delete from fileregistertable where filename='$targetFile'");
        unlink("uploadfile/$targetFile");
        header("Location:filemanager.php");   
        $link -> close(); 
    }

    elseif($act =="rename"){
        echo '<html>
            <body>
            <p>modify file name(ex:123.jpg)</p>
            <form action="modifyfile.php" method="post">
            <input type="text" name="chfilename">
            <input type="submit" value="Change">
            <input type="hidden" name="target" value="'.$targetFile.'">
            </form>
            </body>
            </html>';
        
        // $link = mysqli_connect("localhost", "root", "", "webregister");
        // $link -> set_charset("utf8");
        // $result = $link -> query("upload from fileregistertable where filename='$targetFile'");

        //header("Location:modifyfile.php"); 
    }

    elseif($act == "download"){
        $filePath = "uploadfile/".$targetFile;
        header("Content-type: text/html; charset=utf-8");
        header("Content-type: ".filetype($filePath)."; charset=utf-8");
        header("Content-Disposition: attachment; filename=$targetFile");
        readfile($filePath);
        // header('content-disposition:attachment;filename=uploadfile/'.$targetFile);	//告訴瀏覽器通過何種方式處理檔案
        // header('content-length:'.filesize('uploadfile/'.$targetFile));	//下載檔案的大小
        // readfile($targetFile);	 //讀取檔案

    }
?>