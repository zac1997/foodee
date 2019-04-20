<div id="fh5co-menus" data-section="menu">
	<div class="container">
		<form action="dbcontroller.php" method="POST">
		<div class="row text-center fh5co-heading row-padded">
			<div align="center">
				<h2 class="heading to-animate">Food Menu</h2>
				<p class="sub-heading to-animate">The Heart of foodee.</p>
			</div>
		</div>
<?php
include "conf.php";
$sql = "SELECT type from dish GROUP BY type";
$res = mysqli_query($con, $sql);
if( !$res ){
	echo mysqli_error($con);
}
while ( $row = mysqli_fetch_array($res) ) {
	$type = $row['type'];
?>
<!--food menu-->

		<div class="col-lg-6">
			<div class="fh5co-food-menu to-animate-2">
				<h2 ><?=  $type ?></h2>
				<ul>
<?php
$sql2 = "SELECT `name`,`dish_id`,`desc`,`price`,`image` from dish WHERE type = '$type' AND availability=1 ";
$res2 = mysqli_query($con, $sql2);
if( !$res2 ){
	echo mysqli_error($con);
}
while ( $row2 = mysqli_fetch_array($res2) ) {
?>

					<li>
						<div class="fh5co-food-desc">
							<figure>
								<img src="<?= $row2['image'] ?>" class="img-responsive" alt="<?= $row2['name'] ?>">
							</figure>
							<div>
								<h3><?= $row2['name'] ?></h3>
								<p><?= $row2['desc'] ?></p>
							</div>
						</div>
						<div class="fh5co-food-pricing">
							Rs : <?= $row2['price'] ?>
							</div>
						<div class="switch switch-flat">
							
						<input class="switch-input" type="checkbox" name="dishes[]" value="<?= $row2['dish_id'] ?>" />
							<span class="switch-label" data-on="On" data-off="Off">Yummy</span> 
							<span class="switch-handle"></span> 
							
						</div>
					</li>
<?php
}
?>
				</ul>	
			</div>
		</div>

<?php
}
?>
	</div>
</div>	
<div>
	<p align="center">
		<?php
		if ( isset($_SESSION['name']) ) {
		?>
			<button type="submit" class="btn btn-primary btn-lg" name="cart" >
			    <span class="glyphicon glyphicon-shopping-cart" align="center"></span> Add to cart
			</button>
			<button type="submit" class="btn btn-primary btn-lg" name="buy" >
			    <span class="glyphicon glyphicon-shopping-cart" align="center"></span> Buy Now
			</button>
		<?php
		}
		else {
		?>
			<button type="button" class="btn btn-lg" onclick="loginError()">
			    <span class="glyphicon glyphicon-shopping-cart" align="center"></span> Add to cart
			</button>
		<?php
		}
		?>
   		
  	</p> 
</div>