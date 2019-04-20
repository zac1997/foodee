<?php
include "conf.php";

if ( isset($_SESSION['uname']) ) {
  $uname = $_SESSION['uname'];
  $sql4 = "SELECT * from orders where uname='$uname'";
  $res4 = mysqli_query($con,$sql4);
  if ( mysqli_num_rows($res4) > 0 ) {
?>

<div id="fh5co-order" data-section="order">
  <div class="fh5co-overlay"></div>
  <div class="container">
    <div class="row text-center fh5co-heading row-padded">
      <div class="col-md-8 col-md-offset-2 to-animate">
        <h2 class="heading">My Orders</h2>
      </div>
    </div>
  <table>
    <thead>
      <tr>
        <th rowspan="2">Dish Name</th>
        <th rowspan="2">Quantity</th>
        <th colspan="2">Price</th>
        <th rowspan="2">Cancel Order</th>
      </tr>
      <tr>
        <th>Per Dish</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT d.dish_id,d.name,d.price,o.quantity,o.payment from dish as d join orders as o where d.dish_id=o.dish_id and o.uname='$uname' and o.completion_status=0";
$res = mysqli_query($con, $sql);
$totalPrice=0;
$totalQuantity=0;
$payment = 0;
if( !$res ){
  echo mysqli_error($con);
}
while ( $row = mysqli_fetch_array($res) ) {
?>
      <tr>
        <form action="dbcontroller.php" method="POST">
          <td><?= $row['name'] ?></td>
          <td><input type="number" name="quantity" value="<?= $row['quantity'] ?>" />
            <input type="hidden" name="dish_id" value="<?= $row['dish_id'] ?>" /></td>
          <td><?= $row['price'] ?></td>
          <td><?php
            $price = $row['quantity'] * $row['price']; 
            $totalPrice = $totalPrice + $price;
            $totalQuantity = $totalQuantity + $row['quantity'];
            $payment = $row['payment'];
            echo $price;
           ?></td>
          <td><input type="submit" name="removeFromOrder" class="btn-lg btn-primary" style="background: url(images/icon-delete.png); background-repeat: no-repeat;" />
          </td>
        </form>
      </tr>
<?php
}
?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="3">Total Quantity : <?= $totalQuantity ?></th>
        <th colspan="3">Total Price : <?= $totalPrice ?></th>
      </tr>
      <?php
        if ( $payment == 0 ) {
      ?>
      <tr><form action="payment.php" method="POST" target="_blank">
          <th colspan="12">
            <input type="hidden" name="total_price" value="<?= $totalPrice ?>" />
            <input type="submit" value="Pay Now!!!" name="payment" class="btn btn-lg btn-primary" />
          </th>
        </form>
      </tr>
      <?php
        }
        else {
      ?>
      <tr>
        <th colspan="12" style="font-size: 12px; color: green;"><b>Note : </b>Order will be delivered soon.</th>
      </tr>
      <?php
        }
      ?>
    </tfoot>
    
    
  </table>
  </div>
</div>
<?php
  }
}
?>