<!DOCTYPE html>
<?php 
	session_start();					
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml%22%3E">
<head>
    <meta charset="utf-8" />
    <title>modify data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" herf="style.css">
	 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="successlogin.php">Web</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
   			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="memberlist.php">Member list</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="modifydata.php">Modify data</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="filemanager.php">File manager</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="messageboard.php">Message board</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="checksub.php">Subscribe</a>
                    </li>


                </ul>
                <div class="title m-b-md" style>				
                    Hello, 
                    <?php 
                        echo $_SESSION['username'] 
                    ?>					
                    <form action="logout.php" method="post">
						<button class="btn btn-outline-success mt-2" type="submit">logout</button>
					</form>
                </div>
			</div>
		</div>
	</nav>
</head>

<body>
    <?php
        $username = $_SESSION["username"];

        $link = mysqli_connect("localhost", "root", "", "webregister") or die("Error with webregister db connection!");
        $link -> set_charset("utf8");

	    $result = $link -> query("select * from webregistertable where username='$username'");
	    $data = $result -> fetch_array(MYSQLI_ASSOC);
    ?>
    <div>
        <h1 style="text-align:center">Modify data</h1>
        <table class="table">
            <tr>
                <th>username</th>
                <th>password</th>
                <th>email</th>
                <th>gender</th>
                <th>favorite color</th>
            </tr>
            <form action="modifydatatoDB.php" method="post">
                <div>    
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="username" value=<?php echo $data['username'];?> />
                        </td>
                        <td>
                            <input class="form-control" type="text" name="password" value=<?php echo $data['password'];?> />
                        </td>
                        <td>
                            <input class="form-control" type="email" name="email" value=<?php echo $data['email'];?> />
                        </td>
                        <td>
                            <label><input type="radio" value="male" name="gender"<?php if($data['gender']=="male"){echo 'checked';}?> />male</label>
                            <label><input type="radio" name="gender" value="female" <?php if($data['gender']=="female"){echo 'checked';}?> />female</label>

                        </td>
                        <td>
                            <input class="form-control" type="color" name="color" value=<?php echo $data['color'];?> />
                        </td>
                    </tr>
                </div>
                <div>
                    <input type="submit" value="modify uesr data" />
                </div>
            </form>
        </table>
    </div>
</body>
</html>