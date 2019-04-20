<?php
include "conf.php";

if ( isset($_GET['logout']) ) {
	session_start();
	session_destroy();
	header("location:index.php");
}

if (isset($_POST['login'])) {
	$uname = $_POST['uname'];
	$password = md5($_POST['pwd']);
	$sql = "SELECT name,type FROM user WHERE uname='$uname' AND password='$password'";
	$result = mysqli_query($con,$sql);
	if( !$result ){
		echo mysqli_error($con);
	}
	else { 
		if ( mysqli_num_rows($result) == 1 ) {
			session_start();
			$_SESSION['uname']=$uname;
			$row = mysqli_fetch_array($result);
			$type = $row['type'];
			$_SESSION['type']=$type;
			$_SESSION['name']=$row['name'];
			if ( $type == "client" ) {
				header("location:index.php");
			}
			else if ( $type == "chef" ) {
				header("location:admin/index.php");
			}
			else if ( $type == "ceo" ) {
				header("location:admin/index.php");
			}
		}
		else
			echo "Register now";
	} 

}

if (isset($_POST['register'])) {
	$name = $_POST['fname'];
	$uname = $_POST['uname'];
	$password = md5($_POST['pwd']);
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	$sql = "INSERT INTO user (uname, name, password, email_id, contact_no, address, type) VALUES ('$uname','$name','$password','$email',$contact,'$address','client')";
	$result = mysqli_query($con,$sql);	
	if( !$result ){
		echo mysqli_error($con);
	}
	else { 
		header("location:index.php");
	}
}

if(isset($_POST['feedback'])) {
	session_start();
	if ( isset($_SESSION['uname']) ) {
		$uname = $_SESSION['uname'];
		$comment = $_POST['comment'];
		$sql = "INSERT INTO complaint (`uname`,`desc`) VALUES ('$uname','$comment')";
		$result = mysqli_query($con,$sql);
		if( !$result ){
			echo mysqli_error($con);
		}
		else { 
			echo "<script>
			alert('Feedback Recorded.');
			window.location.href='index.php';
			</script>";
		}
	}
	else {
		echo "<script>
		alert('Login Needed.');
		window.location.href='index.php';
		</script>";
	}
	

}

if ( isset($_POST['cart']) ) {
	session_start();
	$uname = $_SESSION['uname'];
	$dish = $_POST['dishes'];
	for ($k = 0; $k < count($dish); $k++) {
	    $sql = "INSERT INTO cart (uname,dish_id,quantity) VALUES ('$uname',$dish[$k],1)";
	    $result = mysqli_query($con,$sql);
		if( !$result ){
			echo mysqli_error($con);
		}
	}
	header("location:index.php");
}

if ( isset($_POST['updateQuantity']) ) {
	session_start();
	$uname = $_SESSION['uname'];
	$quantity = $_POST['quantity'];
	$dish_id = $_POST['dish_id'];
	for ($k = 0; $k < count($dish_id); $k++) {
	    $sql = "UPDATE cart SET quantity=$quantity[$k] WHERE uname='$uname' AND dish_id=$dish_id[$k]";
	    $result = mysqli_query($con,$sql);
		if( !$result ){
			echo mysqli_error($con);
		}
	}
	header("location:index.php");
}

if ( isset($_POST['removeFromCart']) ) {
	$cart_id = $_POST['cart_id'];
	$sql = "DELETE FROM cart WHERE cart_id=$cart_id";
	$result = mysqli_query($con,$sql);
	if ( !$result ) {
		echo mysqli_error($con);
	}
	else {
		header("location:index.php");
	}
}

if ( isset($_POST['buyFromCart']) ) {
	session_start();
	$uname = $_SESSION['uname'];
	$sql = "SELECT dish_id,quantity FROM cart WHERE uname='$uname'";
	$res = mysqli_query($con,$sql);
	if ( !$res ) {
		echo mysqli_error($con);
	}
	else {
		while ( $row=mysqli_fetch_array($res) ) {
			$dish_id = $row['dish_id'];
			$quantity = $row['quantity'];
			$sql2 = "INSERT INTO orders (uname,dish_id,quantity) VALUES ('$uname',$dish_id,$quantity)";
			$res2 = mysqli_query($con,$sql2);
			if ( !$res2 ) {
				echo mysqli_error($con);
			}
		}
		$sql3 = "DELETE FROM cart where uname='$uname'";
		$res3 = mysqli_query($con,$sql3);
		if ( !$res3 ) {
			echo mysqli_error($con);
		}
		else {
			header("location:index.php");
		}
	}
}

if ( isset($_POST['buy']) ) {
	session_start();
	$uname = $_SESSION['uname'];
	$dish = $_POST['dishes'];
	for ($k = 0; $k < count($dish); $k++) {
	    $sql = "INSERT INTO orders (uname,dish_id,quantity) VALUES ('$uname',$dish[$k],1)";
	    $result = mysqli_query($con,$sql);
		if( !$result ){
			echo mysqli_error($con);
		}
	}
	echo "<script>
		window.location.href='index.php?buy';
		</script>";
}

if ( isset($_POST['removeFromOrder']) ) {
	session_start();
	$uname = $_SESSION['uname'];
	$dish_id = $_POST['dish_id'];
	$sql = "DELETE FROM orders WHERE uname='$uname' AND dish_id=$dish_id";
	$result = mysqli_query($con,$sql);
	if ( !$result ) {
		echo mysqli_error($con);
	}
	else {
		echo "<script>
		alert('Order cancelled.');
		window.location.href='index.php';
		</script>";
	}
}

if ( isset($_POST['orderCompleted']) ) {
	$uname = $_POST['uname'];
	$dish_id = $_POST['dish_id'];
	$sql = "UPDATE orders SET status=1, completion_time=now() WHERE uname='$uname' AND dish_id=$dish_id";
	$result = mysqli_query($con,$sql);
	if ( !$result ) {
		echo mysqli_error($con);
	}
	else {
		echo "<script>
		alert('Order Completed.');
		window.location.href='admin/index.php';
		</script>";
	}
}

if ( isset($_POST['changeAvailability']) ) {
	$dish_id = $_POST['dish_id'];
	$availability = $_POST['availability'];
	if ( $availability == 0 ) {
		$sql = "UPDATE dish SET availability=1 WHERE dish_id=$dish_id";
	}
	else {
		$sql = "UPDATE dish SET availability=0 WHERE dish_id=$dish_id";
	}
	
	$result = mysqli_query($con,$sql);
	if ( !$result ) {
		echo mysqli_error($con);
	}
	else {
		echo "<script>
		alert('Availability Changed.');
		window.location.href='admin/index.php';
		</script>";
	}
}

if ( isset($_POST['pay']) ) {
	session_start();
	$uname = $_SESSION['uname']; 
	$name = $_POST['name'];
	$number = $_POST['cno'];
	$mon = $_POST['month'];
	$year = $_POST['year'];
	$cvv = $_POST['cvv'];
	$t = $_POST['total_price'];

	$sql = "SELECT * FROM card WHERE card_no=$number and cvv=$cvv";
	$result = mysqli_query($con,$sql);
	if ( !$result ) {
		echo "1".mysqli_error($con);
	}
	else {
		while ( $row=mysqli_fetch_array($result) ) {
			if ( $row['balance'] >= $t ) {
				$sql1 = "UPDATE orders SET payment=1 where uname='$uname'";
				$sql2 = "INSERT INTO receipt (uname , total_price, issue_time) VALUES ('$uname', $t, now())";
				$sql3 = "UPDATE card SET balance=balance-$t WHERE card_no=$number";
				$res1 = mysqli_query($con,$sql1);
				$res2 = mysqli_query($con,$sql2);
				$res3 = mysqli_query($con,$sql3);
				if ( !$res1 ) {
					echo "2".mysqli_error($con);
				}
				else if ( !$res2 ) {
					echo "3".mysqli_error($con);
				}
				else if ( !$res3 ) {
					echo "3".mysqli_error($con);
				}
				else {
					$sql4 = "SELECT order_id FROM orders WHERE uname='$uname'";
					$sql5 = "SELECT receipt_no FROM receipt WHERE uname='$uname'";
					$res4 = mysqli_query($con,$sql4);
					$res5 = mysqli_query($con,$sql5);
					if ( !$res4 ) {
						echo "4".mysqli_error($con);
					}
					else if ( !$res5 ) {
						echo "5".mysqli_error($con);
					}
					else {
						$row2=mysqli_fetch_array($res5);
						while ( $row1=mysqli_fetch_array($res4) ) {
							$t1 = $row1['order_id'];
							$t2 = $row2['receipt_no'];
							$sql6 ="INSERT INTO receipt_has_orders (receipt_no, order_id) VALUES ($t1, $t2)";
							$res6 = mysqli_query($con,$sql6);
							if ( !$res6 ) {
								echo "6".mysqli_error($con);
							}
							else {
								header("location:receipt.php");
							}
						}
					}
				}

			}
			else {
				echo "<script>
					alert('You dont have enough balance to place your order.');
					window.location.href='index.php';
					</script>";
			}
		}
	}
}

if ( isset($_POST['vendor']) ) {
	$name = $_POST['vname'];
	$contact = $_POST['contact'];
	$amt = $_POST['amt'];
	$product_id = $_POST['product_id'];
	$sql = "INSERT INTO vendor (name, contact_no) VALUES ('$name', $contact)";
    $result = mysqli_query($con,$sql);
	if( !$result ){
		echo mysqli_error($con);
	}
	else {
		$sql1 = "SELECT vendor_id FROM vendor WHERE name='$name'";
		$res1 = mysqli_query($con,$sql1);
		if ( !$res1 ) {
			echo mysqli_error($con);
		}
		else {
			$row = mysqli_fetch_array($res1);
			for ($k = 0; $k < count($amt); $k++) {
				$sql2 = "INSERT INTO vendor_has_product VALUES ($row[0], $product_id[$k], $amt[$k]);";
				$res2 = mysqli_query($con,$sql2);
				if ( !$res2 ) {
					echo mysqli_error($con);
				}
				$sql3 = "SELECT vendor_id FROM `vendor_has_product` WHERE product_id=$product_id[$k] ORDER BY amount ASC";
				$res3 = mysqli_query($con,$sql3);
				if ( !$res3 ) {
					echo "327".mysqli_error($con);
				}
				$row2 = mysqli_fetch_array($res3);
				$sql4 = "UPDATE product SET aprroved_to=".$row2['vendor_id']." WHERE product_id=".$product_id[$k];
				$res4 = mysqli_query($con,$sql4);
				if ( !$res4 ) {
					echo "333".mysqli_error($con);
				}
			}
			echo "<script>
				alert('Quotation Submitted.');
				window.location.href='index.php';
				</script>";
		}
		
	}
}

// if ( isset($_POST['quotationApprove']) ) {
// 	$product_id = $_POST['product_id'];
// 	for ($k = 0; $k < count($product_id); $k++) {
// 	    echo $product_id[$k]."<br>";
// 	    $sql = "UPDATE product SET complete_date=now() WHERE product_id=$product_id[$k]";
// 	    $result = mysqli_query($con,$sql);
// 		if( !$result ){
// 			echo mysqli_error($con);
// 		}
// 	}
// 	header("location:admin/index.php");
// }

?>