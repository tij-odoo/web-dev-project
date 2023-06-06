<?php
	session_start();
	include("db.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Otaku Online Shop Project </title>
		<link rel="icon" href="images/logo.png" type="image" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	<body>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="30%"><img src="images/logo.png" width="50%"</td>
				
				<td align="right">
					<?php 
					include("Login.php");
					?>
				</td>
				
			</tr>
			
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellpadding="10" cellspacing="0">
						<tr>
							<th class="title"><a href="index.php" style="color:white"> Home </a></th>
							
							<th>
								<div class="dropdown">
								<button class="productsBtn"><u> Products </u></button>
								<div class="productsCat">
<?php
	$query="SELECT * FROM category";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	while ($row = mysqli_fetch_assoc($result)) {
	$cid = $row['cid'];
	$cname = $row['cName'];
	echo "<p align=\"center\"><a href=\"products.php?catid=".$cid."\">".$cname."</a></p>";
		}
?>
								</div>
								</div>
							</th>
							
							<th class="title"><a href="contactUs.php" style="color:white"> Contact US </a></th>
							
							<form name="searchForm" method="post" action="search.php">
							<th class="title" align="right" style="color:white"> Search:
								<input type="search" name="keyword" required min="3">
								<input type="submit" value="Search">	
							</th>
							</form>

							
						</tr>
					</table>
				</td>
			</tr>