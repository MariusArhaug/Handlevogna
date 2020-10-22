
<?php include('comp/server.php');
?>

<?php if(isset($_SESSION['bruker_id'])){ ?>
<!DOCTYPE html>
<html>
	<?php include('comp/head.php'); ?>
	
	<body class="fadeIn	">
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
										<!--//$sql = "SELECT * FROM bruker WHERE brukernavn = '$username', email = '$email' , telefonnummer = '$nummer', adresse = '$adresse';"; 
										//mysqli_query($tilkobling, $sql);  -->

							 <div class="profil-info">

								<h1><?= $_SESSION['username'] ?></h1>

								<h3></h3>
							 	<h3>Mobil:</h3>
							 	<h3>Adresse:</h3>
							 </div>
						<?php 				
									
								endif;
							
									?>

							
			

						</div>
				</div> 





				<div class="main-column">
					<div class="profil-setting-container">

						<div class="profil-setting">
							<h2>Mine handlelister</h2>
							<p><a href="logg.php">Gå til alle mine lagrede handlelister</a></p>
							<p><a href="#">Legg til varer</a></p>	
							<img src="bilder/liste.jpg"/>						
						</div>

						<div class="profil-setting">
							<h2>Min profil</h2>
							<p> Administrer din kontoinformasjon og endre instillinger.
							<p><a href="#">Administrer min profil</a></p>
							<img src="bilder/login.png" />							
						</div>

						<div class="profil-setting">
							<h2>Mitt regnskap</h2>
							<p>Hold orden på total kostnader, dersom handlelistene ble følgt</p>
							<p><a href="#">Total kostnader</a></p>
							<img src="bilder/kalkulator.png" />						
						</div>

						<div class="profil-setting">
							<h2>Handlevogna Mobil</h2>
							<p>Prøv vår mobil version av Handlevogna!</p>
							<p><a href="#">Kommer snart</a></p>
							<img src="bilder/mobil.png" />
						</div>

					</div>
				</div>




				<div class="sidebar2" >
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