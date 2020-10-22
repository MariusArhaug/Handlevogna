<?php include('comp/lagre_liste.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include('comp/head.php'); ?>
	</head>
	
	<body>
		<?php include('comp/sidenav.php'); ?>

		<!-- All info må ligge innom #main for at den ikke skal komme ivein med javas-->
		<div id="black-wrapper" onclick="closeNav()"></div>
 		<div id="main">

 		<div id="info-container">
 			<div class="header-container">
					<div class="home-btn">
						<a href="index.php"><h1><img src="bilder/hjem.png"/></a><a href="index.php"> Handlekurven</h1></a>

					</div>

					<div class="topnav">
 							
 					</div>

 					 <div class="login">
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
 			
			<div class="main-container">


				<div class="sidebar1">
 					<span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776; Butikk</span>
 				</div> 

				<div class="main-column">
					<header class="header-flex">
						<div class="header1">
							<h2>Handleliste</h2>
						</div>
					</header>
					
					<div class="handleliste-container">
					<header class="header-flex">
						<div class="header2">
							<h2>Noen andre varer du har lyst på?</h2>
						</div>
					</header>
						<div class="fixed-size-products-scroll">
						<!-- Egen php for å hente varer, burde settes inn i egen pure php fil, skal gjøres-->
						<?php 

								$connect = mysqli_connect("localhost", "root", "", "loginregister");
								$query = "SELECT * FROM matvare_id ORDER BY mat_id ASC";
								$result = mysqli_query($connect, $query);
								$connect->set_charset("utf-8");

							if ($result):
								if(mysqli_num_rows($result) > 0):
									while($product = mysqli_fetch_assoc($result)):
											
						?>
						
						<div class="fixed-size-products" id="scroll-product">

							<form method="post" action="liste.php?action=add&id=<?php echo $product['mat_id']; ?>">
								<div class="products">
									<img src="<?php echo $product['bilde']; ?>"/>
									<h4><?php echo $product['varer_navn']; ?></h4>
									<h4><?php echo $product['pris'];?>,-  kr</h4>
									<input type="text"   name="quantity"    class="form-control" value="1" />
									<input type="hidden" name="name"   		value="<?php echo $product['varer_navn']; ?>" />
									<input type="hidden" name="price"  		value="<?php echo $product['pris']; ?>" />
									<input type="submit" name="add_to_cart" class="btn btn-info" value="Legg til" id="leggtil"/>
								</div>
							</form>

						</div>
							<?php 
									endwhile;
								endif;
							endif;	
						?>
						</div>

					<div class="table-responsive">

						<table class="table">

						<tr>
							<th colspan="10" class="table-header">

								<h2>Bestillings detaljer</h2>

							</th>
						</tr>

						<tr>
							<th width="40%">Produkt navn</th>
							<th width="10%">Antall</th>
							<th width="20%">Pris</th>
							<th width="15%">Total</th>
							<th width="5%">Action</th>
						</tr>
								<form method="post" action="liste.php">
							<?php 
								if(!empty($_SESSION['shopping_cart'])):

								$total = 0;
								foreach($_SESSION['shopping_cart'] as $key => $product):
							?>

						
						<tr>
							
							<td><input type="hidden" name="name" value="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></td>
							<td><input type="hidden" name="quantity" value="<?php echo $product['quantity']; ?>"><?php echo $product['quantity']; ?></td>
							<td><input type="hidden" name="price" value="<?php echo $product['price']; ?>"><?php echo $product['price']; ?>,-  kr</td>
							<td><input type="hidden" name="total" value="<?php echo number_format($product['quantity'] * $product['price'], 2); ?>"><?php echo number_format($product['quantity'] * $product['price'], 2); ?>,-  kr</td>
							<td>

								<a href="liste.php?action=delete&id=<?php echo $product['id']; ?>">
									<div class="btn-danger">Remove</div>
								</a>

							</td>

						</tr>







						<?php 
								$total = $total + ($product['quantity'] * $product['price']);

							endforeach;

						?>
						<tr>
							<td colspan="3"><strong>Total</strong></td>
							<td><input type="hidden" name="absolute_total" value="<?php echo number_format($total, 2); ?>"><?php echo number_format($total, 2); ?>,- kr</td>
							<td></td>
						</tr>
						<tr>
							<!-- Vis lagre knapp, bare når handlelista ikke er tom-->
							<td colspan="5">
								<?php 
									if (isset($_SESSION['shopping_cart'])):
									if (count($_SESSION['shopping_cart']) > 0):

								?>
								<?php if(isset($_SESSION['bruker_id'])): ?>
									<br>
							
									<div class="liste_navn">
										<input type="text" placeholder="Navn på handleliste" id="liste_navn" value="<?php echo $ListeNavn; ?>" name="liste_navn" />
										<button value="submit" name="lagre" id="lagre">Lagre</button>
									</div>
								<?php endif; ?>

								</form>

								<?php  endif; endif; ?>
							</td>
							<?php include('comp/errors.php') ?>
						</tr>
						<?php 
						endif;
						?>
						
						</table>
				</div>


					</div>
				</div>
		

				<div class="sidebar2">
		
					<?php include('comp/pagination.php'); ?>
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