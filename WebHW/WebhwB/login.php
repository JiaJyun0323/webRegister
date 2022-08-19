<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml%22%3E">
<head>
    <meta charset="utf-8"/>
    <title>Web register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" herf="style.css">
	<style>
		@import "style.css";
        @import url("style.css");
    </style>
	
</head>
<body>
	<form action="checklogin.php" method="post">
		<h2>login</h2>
		<div class="input-group">
			<pre><label>username</label></pre>
			<input type="text" name="username" placeholder="username">
		</div>


		<div class="input-group">
			<pre><label>password</label></pre>
			<input type="password" name="password" placeholder="password">
		</div>


		<input type="submit" value="Login"></input>

		<div class="input-group">
			<p class="login-register-text"><pre>no account?<a href="regist.php">Regist here</a></pre></p>
		</div>
	</form>
</body>
</html>