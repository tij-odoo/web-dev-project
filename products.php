<?php
	include("header.php");
	
?>
			<tr>
				<td colspan="2"> <br><br>
						
					
<?php	
	$query="SELECT pid, cat_id, title, price FROM products WHERE cat_id=".$_GET["catid"];
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	while ($row = mysqli_fetch_assoc($result)) {
		$pid = $row['pid'];
		$title = $row['title'];
		$cat_id = $row['cat_id'];
		$price = $row['price'];
	
	$query2="SELECT image FROM images WHERE p_id=$pid limit 1";
	$result2 = mysqli_query($db, $query2) or die(mysqli_error($db));
	$row2 = mysqli_fetch_assoc($result2);
	$image = $row2['image'];	
	
	
	$query1="SELECT cName FROM category WHERE cid=$cat_id";
	$result1 = mysqli_query($db, $query1) or die(mysqli_error($db));
	$row1 = mysqli_fetch_assoc($result1);
	$cname = $row1['cName'];
?>
					<div class="items">
						<?php if($image!="")echo "<img src='images/".$image."' class=\"itemPic\">"; ?>
							<p class="itemDetails"> <b>Title:</b> <?php echo $title; ?><br><br> 
							                          <b>Category:</b><?php echo $cname ?><br><br>
													  <b>Price:</b><?php echo $price; ?>$<br><br>
													  <a href="productDetails.php?pid=<?php echo $pid;?>"> View more... </a>
							</p>
					</div>
<?php 
	}
?>	
	
			</td>
			</tr>				
			
		</table>
	</body>
</html>