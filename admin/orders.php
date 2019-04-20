<?php
if ( isset($_SESSION['name']) ) {
  $uname = $_SESSION['name'];
  $sql4 = "SELECT * from orders where completion_status=0 and payment=1";
  $res4 = mysqli_query($con,$sql4);
  if ( mysqli_num_rows($res4) > 0 ) {
?>

<div id="fh5co-order" data-section="order">
  <div class="fh5co-overlay"></div>
  <div class="container">
    <div class="row text-center fh5co-heading row-padded">
      <div class="col-md-8 col-md-offset-2 to-animate">
        <h2 class="heading">Orders</h2>
      </div>
    </div>
  <table>
    <thead>
      <tr>
        <th>Sr. No</th>
        <th>Client Name</th>
        <th>Dish Name</th>
        <th>Quantity</th>
        <th>Completed??</th>
      </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT d.dish_id,d.name,o.uname,o.quantity from dish as d join orders as o where d.dish_id=o.dish_id and o.completion_status=0 and o.payment=1";
$res = mysqli_query($con, $sql);
if( !$res ){
  echo mysqli_error($con);
}
$i = 1;
while ( $row = mysqli_fetch_array($res) ) {
?>
      <tr>
        <form action="../dbcontroller.php" method="POST">
          <td><?= $i ?></td>
          <td><?= $row['uname'] ?>
            <input type="hidden" name="uname" value="<?= $row['uname'] ?>" /></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['quantity'] ?>
            <input type="hidden" name="dish_id" value="<?= $row['dish_id'] ?>" /></td>
          <td><input type="submit" name="orderCompleted" class="btn-lg btn-success" value="Yes" />
          </td>
        </form>
      </tr>
<?php
$i++;
}
?>
    </tbody>
  </table>
  </div>
</div>
<?php
  }
}
?>