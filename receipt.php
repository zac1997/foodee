<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
	<style type="text/css">
		body {
		    margin-top: 20px;
		}
	</style>
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Foodee</strong>
                        <br>
                        2135 Sunset Blvd
                        <br>
                        Los Angeles, CA 90026
                        <br>
                        <abbr title="Phone">P:</abbr> (213) 484-6829
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p style="padding-left: 35%; text-align: left;">
                        <strong><em>
                        <?php 
                        session_start();
                     	$uname = $_SESSION['uname'];
                     	echo $_SESSION['name'];
                        ?>
                        </em></strong>
                    </p>
                    <p style="padding-left: 35%; text-align: left;">
                        <em>Date: <?= date("d F Y"); ?></em>
                    </p>
                    <p style="padding-left: 35%; text-align: left;">
                        <em>Receipt #: 34522677W</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Dish Name</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>

  
<?php
include "conf.php";

$sql = "SELECT d.dish_id,d.name,d.price,o.quantity from dish as d join orders as o where d.dish_id=o.dish_id and o.uname='$uname' and o.completion_status=0";
$res = mysqli_query($con, $sql);
$totalPrice=0;
$totalQuantity=0;
if( !$res ){
  echo mysqli_error($con);
}
while ( $row = mysqli_fetch_array($res) ) {
?>
    	<tr>
      		<td class="col-md-9"><em><?= $row['name'] ?></em></h4></td>
    		<td class="col-md-1" style="text-align: center"> <?= $row['quantity'] ?> </td>
        	<td class="col-md-1 text-center">&#x20B9;<?= $row['price'] ?></td>
        	<td class="col-md-1 text-center">&#x20B9;
        	<?php
	            $price = $row['quantity'] * $row['price']; 
	            $totalPrice = $totalPrice + $price;
	            $totalQuantity = $totalQuantity + $row['quantity'];
	            echo $price;
	        ?></td>
      </tr>
<?php
}
?>
                        <tr>
                            <td colspan="2">   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>&#x20B9;<?= $totalPrice ?></strong>
                            </p>
                            <p>
                                <strong>&#x20B9;<?php $tax = 0.05*$totalPrice; echo $tax; ?></strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: &#x20B9;</strong></h4></td>
                            <td class="text-center text-danger"><h4><strong><?= $totalPrice+$tax ?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>