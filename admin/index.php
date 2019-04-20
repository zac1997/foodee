<?php
session_start();
if ( isset( $_SESSION['type'] ) ) {
	if ( $_SESSION['type'] == 'chef' ) {
		include "../conf.php";
		include "header.php";
		include "slider.php";
		include "nav.php";
		include "orders.php";
		include "dishes.php";
		include "footer.php";
	}
	else if ( $_SESSION['type'] == 'ceo' ) {
		include "../conf.php";
		include "header.php";
		include "slider.php";
		include "nav2.php";
		include "quotation.php";
		
		
		include "footer.php";
	}
}
else {
	echo "<script>
		alert('Authentication Failed. Login Again.');
		window.location.href='../index.php';
		</script>";
}

?>