<?php
	include("header.php");

	if(!isset($_SESSION["username"])){
		echo "<tr><td colspan=\"2\"><h2 style=\"color:white\"><br><br><i><b> Please LOGIN to view more about each product! </b></i></h2></td></tr>";
	}
	else{
	
		$query="SELECT * FROM products WHERE pid=".$_GET["pid"];
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$row = mysqli_fetch_assoc($result);
			$pid = $row['pid'];
			$cat_id = $row['cat_id'];
			$title = $row['title'];
			$price = $row['price'];
			$description = $row['description'];
			$color = $row['color'];
			
		$query2="SELECT image FROM images WHERE p_id=$pid LIMIT 1";
		$result2 = mysqli_query($db, $query2) or die(mysqli_error($db));
		$row2 = mysqli_fetch_assoc($result2);
		$image = $row2['image'];
			
		$query1="SELECT cName FROM category WHERE cid=$cat_id";
		$result1 = mysqli_query($db, $query1) or die(mysqli_error($db));
		$row1 = mysqli_fetch_assoc($result1);
		$cname = $row1['cName'];
?>
			
			<tr>
				<td colspan="2"> <br><br><br>
					<?php if($image!="")echo "<img src='images/".$image."' width=\"300px\" height=\"300px\">"; ?>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<p style="color:white; font-size: 2em;"> <b> Category: </b><?php echo $cname ?></p>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<p style="color:white; font-size: 2em;"> <b> Title: </b><?php echo $title ?></p>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<p style="color:white; font-size: 2em;"> <b> Discription: </b><?php echo $description ?></p>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<p style="color:white; font-size: 2em;"> <b> Price: </b><?php echo $price ?>$</p>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<p style="color:white; font-size: 2em;"> <b> Color: </b><?php echo $color ?></p>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<p style="color:white; font-size: 2em;"> <b> Size: </b><?php echo $size ?></p>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
<?php 
	
	$query4="SELECT * FROM images WHERE p_id=$pid";
	$result4 = mysqli_query($db, $query4) or die(mysqli_error($db));
	while ($row4 = mysqli_fetch_assoc($result4)) {
		$p_id = $row4['p_id'];
		$gallery = $row4['image'];
?>					
			<div class="gallery">
				<?php echo "<a href=\"productSlideShow.php?p_id=$p_id\"><img src='images/".$gallery."' width=\"200\" height=\"200\"></a>"; ?>
			</div>
<?php 
	}
?>
				</td>
		</tr>
<?php
	}
?>	
</table>
</body>
</html>