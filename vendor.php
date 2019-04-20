<div id="fh5co-cart" data-section="quotation">
  <div class="fh5co-overlay"></div>
  <div class="container">
    <div class="row text-center fh5co-heading row-padded">
      <div class="col-md-8 col-md-offset-2 to-animate">
        <h2 class="heading">Tendor</h2>
      </div>
    </div>
    <form action="dbcontroller.php" method="POST">
      <div class="row">
        <div class="col-md-10 align-center">
          <div class="form-group " style="margin-left: 30%; ">
            <label for="name" class="sr-only">Username</label>
            <input id="name" name="vname" class="form-control" placeholder="Vendor Name/Company Name" type="text" required />
          </div>
          <div class="form-group " style="margin-left: 30%; ">
            <label for="number" class="sr-only">Password</label>
            <input id="number" name="contact" class="form-control" placeholder="Contact No." type="text" required />
          </div>
        </div>
      </div>
      <div class="container">          
        <table>
          <thead>
            <tr>
              <th>Product_ID</th>
              <th>Product_Name</th>
              <th>Quantity</th>
              <th>Estimated Amount</th>
            </tr>
          </thead>
          <tbody>
<?php
$sql = "SELECT * from product";
$res = mysqli_query($con, $sql);
if( !$res ){
  echo mysqli_error($con);
}
while ( $row = mysqli_fetch_array($res) ) {
?>
            <tr>
              <td><?= $row['product_id'] ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['quantity'] ?></td>
              <td>
                <input type="text" class="form-control" name="amt[]" required />
                <input type="hidden" name="product_id[]" value="<?= $row['product_id'] ?>">
              </td>
            </tr>
<?php
}
?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4"><input type="submit" name="vendor" value="Submit Quotation" class="btn btn-primary" /></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </form>
  </div>
</div>

      ​
        