<!DOCTYPE html>
<html>
	<body id="body" class="fadeIn">
<!-- All info må ligge innom #main for at den ikke skal komme ivein med sidenaven-->
		<div id="black-wrapper" onclick="closeNav()"></div>
 		<div id="main">
<!-- Alt må ligger her slik at den ikke blir en del av footeren -->
 			<div id="info-container">
 				<?php 
 					include('header.php');
 				?>			
				<div class="main-container">
					<div class="sidebar1">
 						<span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776; Butikk</span>
 					</div> 

					<div class="main-column">
					
						<div class="meny-container">
							<?php	if(isset($_GET['success'])): ?>
    						<p class="success">	Suksess! Du er nå logget inn!</p>
    						<?php endif; ?>

							<a href="side1.php" style="display: inline-block; text-decoration: none;">
								<div class="meny-group" id="meny-bilde1">
								<h1>Kjøttvarer</h1>
							</div></a>


							<a href="side2.php" style="display: inline-block; text-decoration: none;">
								<div class="meny-group" id="meny-bilde2">
								<h1>Kornprodukter</h1			>				
							</div></a>


							<a href="side4.php" style="display: inline-block; text-decoration: none;">
								<div class="meny-group" id="meny-bilde3">				
								<h1>Grønnsaker</h1>


							</div></a>						


							<a href="side3.php" style="display: inline-block; text-decoration: none;">
								<div class="meny-group" id="meny-bilde4">	
								<h1>Meieri</h1>
							</div></a>

							<a href="side5.html" style="display: inline-block; text-decoration: none;">
								<div class="meny-group" id="meny-bilde5">
								<h1>Annet</h1>
							</div></a>
						<!-- Sier velkommen til brukeren, og viser knapp om å logge ut -->
						

						</div>
					</div>


					<div class="sidebar2">
						<h2></h2>

						<?php include('comp/pagination.php'); ?>

 						<div class="login-header">
	 						<?php   if (isset($_SESSION['bruker_id'])): ?>

								<p>Velkommen <strong><?= $_SESSION['username']; ?></strong></p><br>
											<p>Klikk på min sider for å se flere instillinger og egenskaper!</p>
											<br>
											<p> Klikk her om du vil logge ut!</p>
											<form method="post">
											<a href="index.php?logout"><button type="submit" id="logout" name="logout" value="logout">Logg ut</button></a>
											</form>


							<?php 	endif; ?>
						</div>
					</div>
				</div>
			</div>
<!-- Body slutter her-->
 		</div>
	</body>
</html>