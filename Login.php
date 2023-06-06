<?php
	if(isset($_GET["x"])){
		unset($_SESSION["username"]);
		header("Location:index.php");
	}

	if (isset($_POST["username"]) && isset($_POST["password"])) { 
		$user = $_POST["username"]; 
		$pass = $_POST["password"]; 
		
		$query = "SELECT PASSWORD from users WHERE USERNAME='" . mysqli_real_escape_string($db, $user) . "'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db)); 
		
		$row = mysqli_fetch_assoc($result); 
		
		if ($pass == $row["PASSWORD"]) { 
			$_SESSION["username"] = $user; 
		} 
		else { 
			echo "<h4 style='color:white'>Invalid username or password</h4>";
		}		
	}
	if(!isset($_SESSION["username"])){
?>	
	<form name="loginForm" method="post" action="<?php $_SERVER['PHP_SELF']?>">
		<table>
			<tr> 
				<td style="color:white"> Username: </td>
				<td><input type="text" name="username" required></td>
				</tr>
				
				<tr> 
					<td style="color:white"> Password: </td>
					<td><input type="password" name="password" required></td>
				</tr>
						
				<tr> 
					<td><a href="register.php" style="color:white"> Register? </a></td>
					<td align="right"><input type="submit" value="Login"></td>
				</tr>
		</table>
	</form>

<?php
	}
	else{
		echo "<h4 style='color:white' align='right'>Welcome ".$_SESSION["username"]." <br> ";
		echo "<a style='color:white' href='index.php?x=1'>Logout</a></h4>";
	}
?>
