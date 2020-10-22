<?php
	if ($result):
	if(mysqli_num_rows($result) > 0):
			while($product = mysqli_fetch_assoc($result)):
											//print_r($product);
						?>

						<div class="fixed-size-products <?php echo $product['butikk']; ?> show vare back">
							<form method="post" action="side<?php echo $product['kategori_kategori_id'];?>.php?action=add&id=<?php echo $product['mat_id']; ?>">
							
									<img src="<?php echo $product['bilde']; ?>"/>
									<h4><?php echo $product['varer_navn']; ?></h4>
									<h4><?php echo $product['pris'];?>,-  kr</h4>
									<input type="text"   name="quantity"    class="form-control" value="1" />
									<input type="hidden" name="name"   		value="<?php echo $product['varer_navn']; ?>" />
									<input type="hidden" name="price"  		value="<?php echo $product['pris']; ?>" />
									<input type="submit" name="add_to_cart" class="btn btn-info" value="Legg til" id="leggtil"/>
								
							</form>
						</div>
						<?php 
									endwhile;
								endif;
							endif;	
						?>

