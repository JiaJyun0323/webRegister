<!DOCTYPE html>
<?php 
	session_start();					
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml%22%3E">
<head>
    <meta charset="utf-8" />
    <title>member list</title>
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
						<a class="nav-link"href="modifydata.php">Modify data</a>
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
	<div>
        <h1 style="text-align:center">Member list</h1>
        <table class="table table-warning table-striped">
            <tr>
                <th>username|</th>
                <th>gender|</th>
                <th>color|</th>
                <th>email|</th>
            </tr>
            <?php    			
                $link = mysqli_connect("localhost", "root", "", "webregister") or die("Error with webregister db connection!");
				$link -> set_charset("utf8");
	            
				$result = $link -> query("SELECT * FROM webregistertable");
	            while($data = $result -> fetch_array(MYSQLI_ASSOC)){
                    echo '<tr class="table-active"><td>'.$data['username'].'</td><td>'.$data['gender'].'</td><td>'.$data['color'].'</td><td>'.$data['email'].'</td></tr>';
                }
	            $link -> close();
            ?>
        </table>
    </div>
</body>
</html>