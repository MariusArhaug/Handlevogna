<?php 
	include('comp/server.php');
?>
<!DOCTYPE html>
<html>
	<?php include('comp/head.php'); ?>
	
	<body>
		<div id="black-wrapper" onclick="closeNav()"></div>
		<?php include('comp/sidenav.php'); ?>

		<!-- All info må ligge innom #main for at den ikke skal komme ivein med javas-->
 		<div id="main">
 		
 		<div id="info-container">
 			<?php include('comp/header.php'); ?>
 			
			<div class="main-container">


				<div class="sidebar1">
 					<span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776; Butikk</span>
 				</div> 

				<div class="main-column">
					<div class="add-product-container">
						<div class="add-product">
							<h1>Legg til vare(r)</h1>

							<form method="post" action="add.php" enctype="multipart/form-data">
								<!--Display validation errors her-->
								<?php include('comp/errors.php'); ?>

								<div class="input-group">
									<h3>Navn</h3>
									<input id="add" type="text" name="varer_navn" ">
								</div>

								<div class="input-group">
									<h3>Bilde av produkt</h3>
									<input  type="file" name="bilde">

								</div>

								<div class="input-group">
									<h3>Pris, (kr)</h3>
									<input id="add" type="text" name="pris" >
								</div>


								<div class="input-group">
									<h3>Butikk</h3>
									<select id="add" name="butikk">
										<option value="bunnpris" name="bunnpris">Bunnpris</option>
										<option value="spar" name="spar">Spar</option>
										<option value="coop" name="coop">Coop</option>
									</select>
								</div>

								<div class="input-group">
									<h3>Kategori</h3>
									<select id="add" name="kategori">
										<option value="1" name="kjøtt">Kjøttvarer</option>
										<option value="2" name="kornprodukter">Kornprodukter</option>
										<option value="3" name="meieriprodukter">Meieriprodukter</option>
										<option value="4" name="grønnsaker">Grønnsaker</option>
										<option value="5" name="annet">Annet</option>
									</select>
								</div>

								<button type="submit" name="add" value="add" id="logginn_knapp">Legg til ny vare!</button>
							</form>
						</div>

					</div>	
				</div>



				


					<div class="sidebar2">
						<h2></h2>

						<div class="pagination">
 							<nav>
 								<a href="#">&laquo;</a>
 								<a href="#">1</a>
 								<a href="#">2</a>
 								<a href="#">3</a>
 								<a href="#">4</a>
 								<a href="#">5</a>
 								<a href="#">6</a>
 								<a href="#">&raquo;</a>
 							</nav>
 						</div>

					</div>

				
			</div>
		</div>
		
			<?php include('comp/footer.php'); ?>

 		</div>
	</body>
</html>