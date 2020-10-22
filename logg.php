
<?php include('comp/server.php');
?>

<?php if(isset($_SESSION['bruker_id'])){ ?>
<!DOCTYPE html>
<html>
	<?php include('comp/head.php'); ?>
	<body>
		<div id="black-wrapper" onclick="closeNav()"></div>
		<div id="main">
 		<div id="info-container">
 			<div class="header-container"  id="center-homebutton">
					<div class="home-btn">
						<a href="index.php"><h1><img src="bilder/hjem.png"/></a><a href="index.php"> Handlekurven</h1></a>
						
					</div>
			</div>
			<div class="main-container">
				<div class="sidebar1">
						<div class="profil-container">
							<div class="profil-background-img">
								<div class="profil-bilde">
									<img src="bilder/profil.png" id="darkmode" />
								</div>
							 </div>
							
							 <?php  
							 if (isset($_SESSION['bruker_id'])): ?>
							 <div class="profil-info">

								<h1><?= $_SESSION['username'] ?></h1>

								<h3></h3>
							 	<h3>Mobil:</h3>
							 	<h3>Adresse:</h3>
							 </div>
							<?php 
							endif; ?>

							

						</div>
				</div> 





				<div class="main-column">
					<div class="show-lists-container">
						<?php include('comp/select_list.php'); ?>
					
						<table class="table-logg">

							<tr>
								<th colspan="10" class="table-header">
									<h2>Handlelogg!</h2> <!-- Prøv å få til å echoe 'liste_navn' fra databasen-->
								</th>
							</tr>

							<tr>
								<th width="30%">Produkt navn</th>
								<th width="15%">Antall</th>
								<th width="5%">Pris</th>
								<th width="15%">Total</th>
							</tr>

					<?php		if ($result):
									if(mysqli_num_rows($result) > 0):
										while($logg = mysqli_fetch_assoc($result)):
											//print_r($product);
					?>

							<tr>
								<td><?php echo $logg['varer']; ?></td>
								<td><?php echo $logg['total']; ?></td>
								<td><?php echo $logg['price']; ?></td>
								<td><?php echo $logg['price_total']; ?></td>
								<td></td>
							</tr>
					<?php 
										endwhile;
									endif;
								endif;	
					?>
						</table>


					</div>
				</div>

				<div class="sidebar2">
					<h2><a style="color: black; cursor:pointer;" id="trigger">Nightmode</a></h2>
				</div>
			</div>

		</div>		

 			<?php 
 			include ('comp/footer.php');
 			
 			?>
 		</div>
	</body>
</html>
<?php } else {
	header('location: index.php');
}?>