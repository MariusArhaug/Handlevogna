<!DOCTYPE html>
<html>
	<body id="body class="fadeIn">
		<!-- All info må ligge innom #main for at den ikke skal komme ivein med javas-->
		<div id="black-wrapper" onclick="closeNav()"></div>
 		<div id="main">
 			<div id="info-container">
 			<?php include('header.php'); ?>
				<div class="main-container">
					<div class="sidebar1">
 						<span style=" cursor:pointer" onclick="openNav()">&#9776; Butikk</span>
 					</div> 

					<div class="main-column">
						<div class="main-info">
							<div class="instructions">
								<div class="info-instructions">
									<h1>Laget for å spare deg penger og tid.</h1>
									<p>Med handlekurven kan du logge inn som en bruker å lagre flere ulike handlelister som du ofte bruker. Hvilke varer du velger kan sorteres etter ulike butikker i dette landet, eller etter billigste steder å få tak i dem.</p>
									</form>
								</div>
							</div>

							<div class="login-tab">
								<div class="login-container">
									<h1>Logg inn</h1>

									<form action="index.php" method="post">
									<!-- Vis error meldinger her -->
									<?php include('comp/errors.php'); ?>

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

							<div class="tutorial-container">
								<div class="header1">
									<h2>Tutorial : Hvordan handlelisten fungerer! </h2>
								</div>

								<div class="tutorial">
									<video width="720" height="420" controls>
										<source src="bilder/tutorial.mp4" type="video/mp4">
									</video>
									<a href="video.php">Klikk her for å se videoen</a>
								</div>
							</div>


						</div>
					</div>

					<div class="sidebar2">
					

						<?php include('comp/pagination.php'); ?>
					</div>
				</div>
			</div>
 		</div>
	</body>
</html>
