<?php

	include("conn.php");
  
	$read = "SELECT * FROM elmtree_categories";	
  
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;	
	}
	
?>

<?php
	include("markup/headmarkup.php");
?>

<body>

    <!-- Nav bar details -->
	<?php	
		include("markup/topnav.php");	
	?>
	
	<div class="container bg-white toppadding">
          
				
				<?php
					while($row = $result->fetch_assoc()){
						
						$categoryid = $row["categoryid"];
						$catnamedata = $row["categoryname"];
						$catdescdata = $row["categorydesc"];
						
						echo "<div class='row bg-light border border-success'>
								<div class='col'>
									<h2>$catnamedata</h2>
									<p class='lead'>$catdescdata</p>
									<a class='btn btn-success' href='category.php?catid=$categoryid'>Browse</a>
									<p> </p>
								</div>
							 </div>";
						
					}
				?>
				
	</div>
<?php
	include("markup/endmarkup.php");
?>