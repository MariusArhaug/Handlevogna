<?php
include('comp/handleliste.php'); ?>
<!DOCTYPE html>
<html>
	<?php include('comp/head.php'); ?>
	<body>
		<?php include('comp/sidenav.php');?>
		<!-- All info må ligge innom #main for at den ikke skal komme ivein med javas-->
		<div id="black-wrapper" onclick="closeNav()"></div>
 		<div id="main">

 		<div id="info-container">
 			<?php include('comp/header.php'); ?>
 			
			<div class="main-container">


				<div class="sidebar1">
 					<span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776; Butikk</span>
 				</div> 

				<div class="main-column">

					<header class="header-flex">
						<div class="header1">
							<h2>Kornprodukter</h2>
						</div>

						<div class="header-img">
							<a href="add.php"><img class="btn" src="bilder/add.png"></a>
							<img class="btn" src="bilder/back.png" onclick="reset()"/>
							<img class="btn sorter-btn" src="bilder/coop.png"/>
					   		<img class="btn sorter-btn" src="bilder/bunnpris.png"/>
				   		    <img class="btn sorter-btn" src="bilder/spar.png"/>
				   		    <img class="btn pris-btn" src="bilder/penger.png"/>
				   		</div>
					</header>


					<div id="productContainer" class="fixed-size-container">

						<?php 

								$connect = mysqli_connect("localhost", "root", "", "loginregister");
								$query = "SELECT * FROM matvare_id WHERE kategori_kategori_id = 2 ORDER BY mat_id ASC";

								$result = mysqli_query($connect, $query);
								$connect->set_charset("utf-8");

						?>
						<?php include('comp/varer_vis.php'); ?>
													
					<!--	 Tomme bokser for å vise at flere kan lett legges til -->
						<?php include('comp/varer_filler.php'); ?>
					</div>

					<div class="add-varer">
	 					<h2> Savner du noen varer?</h2>
	 					<h2> Klikk på "+" tenget øverst, for å legge til flere varer!</h2>
	 				</div>

				</div>

					<div class="sidebar2">
						<h2></h2>

						<?php include('comp/pagination.php'); ?>

					</div>

				
			</div>
		</div>
 			<?php 
 				include('comp/footer.php');
 			?>

 		</div>
	</body>
</html>