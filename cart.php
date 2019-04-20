<?php
include "conf.php";
if ( isset($_SESSION['uname']) ) {
  $uname = $_SESSION['uname'];
  $sql4 = "SELECT * from cart where uname='$uname'";
  $res4 = mysqli_query($con,$sql4);
  if ( mysqli_num_rows($res4) > 0 ) {
?>

<div id="fh5co-cart" data-section="cart">
  <div class="fh5co-overlay"></div>
  <div class="container">
    <div class="row text-center fh5co-heading row-padded">
      <div class="col-md-8 col-md-offset-2 to-animate">
        <h2 class="heading">My Cart</h2>
      </div>
    </div>
  <table>
    <thead>
      <tr>
        <th rowspan="2">Dish Name</th>
        <th rowspan="2">Quantity</th>
        <th colspan="2">Price</th>
        <th rowspan="2"></th>
      </tr>
      <tr>
        <th>Per Dish</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
    <form action="dbcontroller.php" method="POST">
  
<?php
$sql = "SELECT d.dish_id,d.name,d.price,c.quantity,c.cart_id from dish as d join cart as c where d.dish_id=c.dish_id and c.uname='$uname'";
$res = mysqli_query($con, $sql);
$totalPrice=0;
$totalQuantity=0;
if( !$res ){
  echo mysqli_error($con);
}
while ( $row = mysqli_fetch_array($res) ) {
?>
      <tr>
          <td><?= $row['name'] ?></td>
          <td><input type="number" name="quantity[]" value="<?= $row['quantity'] ?>" />
            <input type="hidden" name="dish_id[]" value="<?= $row['dish_id'] ?>" /></td>
          <td><?= $row['price'] ?></td>
          <td><?php
            $price = $row['quantity'] * $row['price']; 
            $totalPrice = $totalPrice + $price;
            $totalQuantity = $totalQuantity + $row['quantity'];
            echo $price;
           ?></td>
          <td><input type="submit" name="removeFromCart" class="btn-lg btn-primary" style="background: url(images/icon-delete.png); background-repeat: no-repeat;" />
            <input type="hidden" name="cart_id" />
          </td>
      </tr>
<?php
}
?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="2">Total Quantity : <?= $totalQuantity ?></th>
        <th colspan="2" rowspan="2"><input type="submit" name="updateQuantity" value="Add More" class="btn btn-lg btn-primary"/></th>
        <th colspan="2" rowspan="2"><input type="submit" name="buyFromCart" value="Buy Now" class="btn btn-lg btn-primary"/></th>
      </tr>
      <tr>
        <th colspan="2">Total Price : <?= $totalPrice ?></th>
      </tr>
    </tfoot>
    </form>
    
  </table>
  </div>
</div>
<?php
  }
}
?>