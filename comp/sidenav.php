		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<h3>Matvarer</h3>
			<a href="side1.php">Kjøttvarer</a>
			<a href="side2.php">Kornprodukter</a>
			<a href="side3.php">Meieriprodukter</a>
			<a href="side4.php">Grønnsaker og frukt</a>
			<a href="side5.php">Annet</a>

			<a href="oppgave.php">Oppgaven</a>
			

			<h2><a style="color: gray; cursor:pointer;" id="trigger" onclick="closeNav()">Nightmode</a></h2>

			<?php if(isset($_SESSION['bruker_id'])): ?> 
				<a href="index.php?logout"><button type="submit" id="logout" name="logout" value="logout">Logg ut</button></a>
			<?php endif; ?>

		</div>