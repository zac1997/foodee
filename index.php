<?php
session_start();
include "header.php";
include "slider.php";
include "nav.php";
include "aboutus.php";
include "quotes.php";
include "featured_dishes.php";
include "menu.php";
include "order.php";
include "cart.php";
if ( !isset($_SESSION['name']) ) {
	include "login.php";
	include "signup.php";
}
include "feedback.php";
include "footer.php";
?>