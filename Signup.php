<?php
	session_start();

	include("db.php");
	
	if (isset($_POST["username"]) && isset($_POST["password"])) {
	
	$username = mysqli_real_escape_string($db, $_POST["username"]);
	$password = mysqli_real_escape_string($db, $_POST["password"]);

	$query = "INSERT INTO users (username,password) VALUES ('$username', '$password')";
	mysqli_query($db, $query) or die(mysqli_error($db));

	echo "<h3 style=\"color:red\">Registration for $username was successful </h3><br><br>";
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Form </title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	
	<body>
	
	<script type="text/javascript">
		function validate(){
			var p = document.registerForm.password.value;
			var cp = document.registerForm.conf_password.value;
			
			if(p.length<8){
				document.registerForm.password.value="";
				document.registerForm.conf_password.value="";
				document.getElementById("message1").innerHTML="<i>Password should be at least 6 characters</i>";
				return false;
			}
			
			if(p.length>15){
				document.registerForm.password.value="";
				document.registerForm.conf_password.value="";
				document.getElementById("message1").innerHTML="<i>Password should be at most 10 characters</i>";
				return false;
			}
			
			if(p!=cp){
				document.registerForm.password.value="";
				document.registerForm.conf_password.value="";
				document.getElementById("message1").innerHTML="<i>Confirm your password correctly</i>";
				return false;
			}
			
			return true;
		}
	</script>
	
		<form name="registerForm" action="" method="post" onSubmit="return validate()">
				<table border="0" cellpadding="2" cellspacing="10" align="center" width="30%">
					
					<tr>
						<th class="Ques" width="180px" align="right"> Username: </th>
						<td><input type="text" name="username" autofocus required autocomplete="off"></td>
					</tr>
					
					<tr>
						<th class="Ques" align="right"> Password: </th>
						<td><input type="password" placeholder="password for your account" id="regPass" name="password" required></td>
					</tr>
					
					<tr>
						<th class="Ques" align="right"> Confirm Password: </th>
						<td><input type="password" placeholder="password for your account" id="regPass" name="conf_password" required></td>
					</tr>
					
					<tr>
						<td colspan="2" id="message1" style="color:red" align="center"></td>
					</tr>
		
					<tr>
					<td colspan="2" align="center">
						<input type="reset" value="Clear">
						<input type="submit" value="Save" name="register">
					</td>
				</tr>
					
				</table>
				</form>
		
	</body>
	
</html>