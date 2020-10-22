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
					<h1 style="margin-left: 110px;">Framgangs måte!</h1>
					<div class="oppgave-container">
						<div class="farge-palett-container">
							<h2>Farge palettet som nettsiden følger</h2>
							<p>Tidlig i danning av nettsiden ble et fargepalett dannet for at nettsiden skulle se presentabel ut</p>
							<img src="bilder/fargepalett.jpg">
							<p><strong>Fargekoder:</strong> #eeeeee,  #020401,  #f3f3f3, #c1c1c1, #3e3e3e. 
							<img src="bilder/handlekurven.png" style="width: 100%; height: 400px;">
						</div>

						<div class="database-modell-container">
							<h2>Diagram over hvordan databasen ser ut</h2>
							<p>Under planlegging gikk databasen gjennom flere forandringer, og dette ble tilslutt slutt produktet. I starten var det bare to tabeller, den ene tok for seg å lagre bruker informasjon, og den andre holdt styr på data om de ulike matvarene.</p>
							<img src="bilder/database-diagram.png"">
							<p>Mer forklaring kommer i videoen!</p>
						</div>

						<div class="redigering-container">
							<h2>Bilder som ble tatt og video</h2>
							<p>I nettsiden ble det laget to bilder ved hjelp av gimp bilderedigeringsprogram. De to bildene som ble laget vare to iconer, den ene var et liste icon som ble brukt i profil.php og det andre iconet ble videre gjort om til et gif, ved å ta bilder av oppbyggingen og deretter sette det sammen. Tilslutt ble en videofil brukt i index.php for å lage en "tutorial/how to" video for nye brukere. </p>
							<img src="bilder/liste.jpg" />
							<img src="bilder/logo.gif" />
							<img src="bilder/bildetatt.jpg" />
						</div>

						<div class="utført-container">
							<h2>Utførelse</h2>
							<h3>Oppbygging</h3>
							<p>Nettsiden er i hovedsak bygd opp av html og css styling og ved hjelp av flexbox er nettsiden designet slik ved ganske få problemer på veien, ved hjelp av flexbox er nettsiden også responsive, men den anbefales å bruke i fullstørrelse på 1920x1080px!</p>

							<h3>Språk som ble tatt i bruk</h3>	
							<p>I nettsiden er det som nevnt tidliger brukt html, css og i tilegg blir det brukt php for å koble sammen mysql workbench database til nettsiden, noen enkelte funksjoner ble lagt til ved hjelp av javascript, men nettsiden gjør all database og server action ved hjel av php. Javascript ble lagt til som en siste liten tocuh for å gjøre brukeropplevelsen enklere og bedre!.</p>
						</div>


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