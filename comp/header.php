		<header>	
			<div class="header-container">
					<div class="home-btn">
						<a href="index.php"><img src="bilder/hjem.png"/></a><a href="index.php"><h1>Handlevogna</h1></a>
					
						<div class="gif">
 							<img src="bilder/logo.gif">
 						</div>
					</div>

					<div class="topnav">
 						<form action="/action_page.php">
 							<input type="text" placeholder="Search.." name="search" id="search">
 						<button type="submit" name="submit" id="submit">Søk</button></form>	
 					</div>

 					 <div class="login">
 				<!-- Display enten mine sider, om du er logget inn, eller display login, dersom du ikke er logget på -->
 					 	<?php if (isset($_SESSION['bruker_id'])) { ?>
 					 		<div class="dropdown">
 					 	
 						<a href="profil.php"><img src="bilder/login.png"/></a> <h3>Mine sider</h3>
 							<div class="dropdown-content">
 								<a href="profil.php">Min side</a>
 								<form method="post">
 								<a href="index.php?logout"><button type="submit" id="logout" name="logout" value="logout">Logg ut</button></a>
 								</form>
 							</div>
 						</div>
 					 	<?php } else { ?>
 					 		<a href="login.php"><img src="bilder/login.png"/></a> <h3>Logg inn</h3></a>
						<?php } ?>
 					 					
 					</div>

					<div class="handlekurv">
						<a href="liste.php"><img src="bilder/vogn.png"/></a><h3>Varer</h3>
					</div>
			</div>
		</header>