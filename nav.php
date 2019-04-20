<div class="js-sticky">
	<div class="fh5co-main-nav">
		<div class="container-fluid">
			<div class="fh5co-menu-1">
				<a href="#" data-nav-section="home">Home</a>
				<a href="#" data-nav-section="about">About</a>
				<a href="#" data-nav-section="features">Features</a>
				<?php
				if(isset($_SESSION['uname']) ){
				?>
				<a href="#" data-nav-section="menu">Menu</a>
				<?php
				}
				?>
			</div>
			<div class="fh5co-logo">
				<a href="index.html">foodee</a>
			</div>
			<div class="fh5co-menu-2">
				<?php
				if(isset($_SESSION['uname']) ){
				?>
				<a href="dbcontroller.php?logout">Logout</a>
				<a href="#" data-nav-section="cart">Cart</a>
				<a href="#" data-nav-section="order">Orders</a>
				<a href="#" style="color: red;">Welcome <strong><?php echo $_SESSION['name']; ?></strong></a>	
				<?php
				}
				else {
				?>
				<a href="#" data-nav-section="menu">Menu</a>
				<a href="#" data-nav-section="login">Login/Register</a>	
				<?php
				}
				?>
				<!--<a href="#" data-nav-section="feedback">Feedback</a>-->
			</div>
		</div>
	</div>
</div>