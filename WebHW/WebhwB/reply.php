<!DOCTYPE html>
<?php 
	session_start();					
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml%22%3E">
<head>
    <meta charset="utf-8" />
    <title>test web</title>
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
        $link = mysqli_connect("localhost", "root", "", "webregister") or die("Error with webregister db connection!");
		$link -> set_charset("utf8");

		if (array_key_exists('targetMessage', $_POST))
			$id = $_POST['targetMessage'];
		else
			$id = $_SESSION['replytarget'];

        $_SESSION['replytarget'] = $id;
		$result = $link -> query("SELECT * FROM messageboardtable WHERE id='$id'");
	    while($data = $result -> fetch_array(MYSQLI_ASSOC)){
        	echo '<div class="card"><h5 class="card-header">'.$data['title'].'<br><small class="text-muted">posted by :'.$data['username'].'</small></br></h5><div class="card-body"><td>'.$data['content'].'</td><br><small class="text-muted">edit in : '.$data['date'].'</small></br><form action="reply.php" method="post"><input type="hidden" name="targetMessage" value="'.$data['id'].'"/></form></div></div>';		
		}

	    $link -> close();
    ?>    
    <form action="newreply.php" method="post">
		<div class="card">
			<h5 class="card-header">new a reply</h5>
			<div class="card-body">
				<h5 class="card-title">reply</h5>
				<input class="form-control" type="text" name="reply"/>
				<input class="btn btn-outline-secondary" type="submit" value="send" />
			</div>
		</div>
	</form>

	<?php
        $link = mysqli_connect("localhost", "root", "", "webregister") or die("Error with webregister db connection!");
		$link -> set_charset("utf8");

		$nowuser =$_SESSION['username'];
		$targetmessage = $_SESSION['replytarget'];
		$result = $link -> query("SELECT * FROM replymessagetable WHERE replyid='$targetmessage'");
	    while($data = $result -> fetch_array(MYSQLI_ASSOC)){
        	echo '<div class="card"><h5 class="card-header">Responder:'.$data['username'].'</h5><div class="card-body"><td>'.$data['content'].'</td><br><small class="text-muted">edit in : '.$data['date'].'</small></br>	</div></div>';		
			if($nowuser==$data["username"]){
				echo '
				<tr class="table-active">
					<form action="replyaction.php" method="post">
						<input type="hidden" name="targetreply" value="'.$data['id'].'">

						<td>
							<input class="btn btn-outline-danger" type="submit" value="delete" name="action" />
						</td>
						<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							edit
					  	</button>
						<div class="collapse" id="collapseExample">
							<div class="card card-body">
								<h5>edit reply :</h5>
								<input type="text" name="chcontent">
								<td>
									<input class="btn btn-outline-success" type="submit" value="edit" name="action"/>
								</td>
							</div>
						</div>					

					</form>
				</tr>';
			}
		
		}

	    $link -> close();		
	?>
</body>
</html>