<?php include('comp/server.php'); ?>
<!DOCTYPE html>
<html>
	<?php include('comp/head.php'); ?>
	
	<body id="body">
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
 				</div> 


				<div class="main-column">

					<div class="login-container">
						<h1>Logg inn</h1>

					<form action="login.php" method="post">
					<!-- Vis error meldinger her -->
					<?php include('comp/errors.php');
							include('comp/success.php'); ?>

						<div class="input-group">
							<label>Brukernavn</label>
							<h3>Epost eller brukernavn</h3>
							<input id="brukernavn" type="text" placeholder="Brukernavn.." name="username">  									
							<a href="#"><h3>Har du glemt epostadressen ditt?</h3></a>
						</div>

						<div class="input-group">
							<label>Passord</label></br>				
							<input id="passord" type="password" placeholder="Passord.." name="password">				
							<a href="#"><h3>Har du glemt passordet ditt?</h3></a>				
						</div>			

						<button type="submit" name="login" value="login" id="logginn_knapp">Logg inn</button>				
							<a href="signup.php"><h2>Opprett ny bruker</h2></a>				

					</form>


					</div>
						



				</div>

					<div class="sidebar2">
							<h2><a style="color: black; cursor:pointer;" id="trigger">Nightmode</a></h2>
					
 				
					</div>

				

			</div>

		</div>
			<?php 
				include('comp/footer.php');
			?>
 		</div>
	</body>
</html>