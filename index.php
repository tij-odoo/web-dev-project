<?php
	include("header.php");
?>

			
			<tr>
				<td colspan="2">
					<h1 style="color:white">Latest Products</h1>
<?php					
	$query="SELECT * FROM products order by pid desc LIMIT 9";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	while ($row = mysqli_fetch_assoc($result)) {
		$pid = $row['pid'];
		$title = $row['title'];	
		
		$query2="SELECT image FROM images WHERE p_id=$pid ";
		$result2 = mysqli_query($db, $query2) or die(mysqli_error($db));
		$row2 = mysqli_fetch_assoc($result2);
		$image = $row2['image'];
?>
		<div class="LatestProducts">
<?php
		echo "<b>".$title."</b>";
		echo "<a href=\"productDetails.php?pid=".$pid."\"><img src='images/".$image."' class=\"LatestProductImage\"></a>";
?>
		</div>
<?php
	}
?>	
					
				</td>
			</tr>
			
			<tr>
				<td colspan="2" style="color:white">
					<h2>About US</h2>
					Where the world is full of Manga and anime product!!!<br>
					We are a store who want to spread the love and pation for anime and manga to the entire world.
					we would be happy to make sure that our customers are satisfied and happy with our services.
				</td>
			</tr>
			
			<tr>
			  <td colspan="2" style="color:white">
			  <h3>social media</h3>
			  <a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-twitter"></a>
              <a href="#" class="fa fa-google"></a>
              <a href="#" class="fa fa-youtube"></a>
              <a href="#" class="fa fa-instagram"></a>
			  </td>
			</tr> 
			
		</table>
		
	</body>
</html>