<?php include('comp/server.php'); ?>
<!DOCTYPE html>
<html>
	<?php include('comp/head.php'); ?>
	
	<body>

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
					<div class="signup-container">
						<h1>Sign up</h1>
					<form method="post" action="signup.php">
						<!--Display validation errors her-->
						<?php include('comp/errors.php'); ?>

						<div class="input-group">
							<h3>Brukernavn</h3>
							<input id="brukernavn" type="text" name="username" value="<?php echo $username; ?>">
						</div>

						<div class="input-group">
							<h3>Email</h3>
							<input id="email" type="email" name="email" value="<?php echo $email; ?>">
						</div>

						<div class="input-group">
							<h3>Passord</h3>
							<input id="passord" type="password" name="password_1" >
						</div>


						<div class="input-group">
							<h3>Gjenta passord</h3>
							<input id="passord" type="password" name="password_2" >
						</div>

						<h4>Annen info</h4>
						<div class="input-group">
							<h3>Fornavn</h3>
							<input class="annen-info-signup" type="text" name="fornavn" placeholder="fornavn">
						</div>

						<div class="input-group">
							<h3>Etternavn</h3>
							<input class="annen-info-signup" type="text" name="etternavn" placeholder="etternavn">
						</div>

						<div class="input-group">
							<h3>Telefonummer</h3>
							<input class="annen-info-signup" type="text" name="nummer" placeholder="telefonnummer">
						</div>

						<div class="input-group">
							<h3>Adresse</h3>
							<input class="annen-info-signup" type="text" name="adresse" placeholder="adresse">
						</div>

						<div class="input-group">
							<h3>Postnummer</h3>
							<input class="annen-info-signup" type="text" name="postnummer" placeholder="postnummer">	
						</div>

						<button type="submit" name="register" value="login" id="logginn_knapp">Registrer deg</button>
						<p>
							Allerede et medlem? <a href="login.php">Sign in</a>
						</p>
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