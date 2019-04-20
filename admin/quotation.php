<div id="fh5co-order" data-section="approved">
  <div class="fh5co-overlay"></div>
  <div class="container">
    <div class="row text-center fh5co-heading row-padded">
      <div class="col-md-8 col-md-offset-2 to-animate">
        <h2 class="heading">Quotations Approved To</h2>
      </div>
    </div>
    <table>
      <tbody>
        <tr>
          <th>Vendor Name</th>
          <th>Vendor Contact No</th>
          <th>Product Id</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Least Estimate Cost</th>
        </tr>
<?php
$sql = "SELECT p.product_id, p.name as pname, p.quantity, v.amount, s.name as vname, s.contact_no FROM product as p, vendor_has_product as v, vendor as s where p.product_id=v.product_id and p.aprroved_to=v.vendor_id and p.aprroved_to=s.vendor_id";
$res = mysqli_query($con, $sql);
if( !$res ){
  echo mysqli_error($con);
}
while ( $row = mysqli_fetch_array($res) ) {

?>
      <tr>
        <td><?= $row['vname'] ?></td>
        <td><?= $row['contact_no'] ?></td>
        <td><?= $row['product_id'] ?></td>
        <td><?= $row['pname'] ?></td>
        <td><?= $row['quantity'] ?></td>
        <td><?= $row['amount'] ?></td>
      </tr>
<?php
}
?>
      </tbody>
    </table>
  </div>
</div>