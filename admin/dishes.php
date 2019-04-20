<?php
if ( isset($_SESSION['name']) ) {
  $uname = $_SESSION['name'];
  $sql4 = "SELECT * from dish";
  $res4 = mysqli_query($con,$sql4);
  if ( mysqli_num_rows($res4) > 0 ) {
?>

<div id="fh5co-order" data-section="dishes">
  <div class="fh5co-overlay"></div>
  <div class="container">
    <div class="row text-center fh5co-heading row-padded">
      <div class="col-md-8 col-md-offset-2 to-animate">
        <h2 class="heading">Dishes</h2>
      </div>
    </div>
  <table>
    <thead>
      <tr>
        <th>Sr. No</th>
        <th>Dish Id</th>
        <th>Dish Name</th>
        <th>Availability</th>
      </tr>
    </thead>
    <tbody>
<?php
// $sql = "SELECT d.dish_id,d.name,o.uname,o.quantity from dish as d join orders as o where d.dish_id=o.dish_id and o.status=0";
// $res = mysqli_query($con, $sql);
// if( !$res ){
//   echo mysqli_error($con);
// }
$i = 1;
while ( $row = mysqli_fetch_array($res4) ) {
?>
      <tr>
        <form action="../dbcontroller.php" method="POST">
          <td><?= $i ?></td>
          <td><?= $row['dish_id'] ?>
            <input type="hidden" name="dish_id" value="<?= $row['dish_id'] ?>" /></td>
          <td><?= $row['name'] ?></td>
          <?php
            if ( $row['availability'] == 1 ) {
              ?>
              <td><input type="submit" name="changeAvailability" class="btn-lg btn-success" value="Available" />
              <input type="hidden" name="availability" value="<?= $row['availability'] ?>" />
              <?php
            }
            else {
          ?>
            <td><input type="submit" name="changeAvailability" class="btn-lg btn-danger" value="Unavailable" />
            <input type="hidden" name="availability" value="<?= $row['availability'] ?>" />
          <?php
          }
          ?>
          </td>
        </form>
      </tr>
<?php
$i++;
}
?>
      <tr>
        <input type="button" name="">
      </tr>
    </tbody>
  </table>
  </div>
</div>
<?php
  }
}
?>

<div id="fh5co-contact" data-section="registration" >
  <div class="container">
    <form action="" method="POST">
      <div class="row text-center fh5co-heading row-padded">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="heading to-animate">New Dish</h2>
        </div>
      </div>
      <div class="row">
        </div>
        <div class="col-md-12 to-animate-2">
          <h3>Dish Details</h3>
          <div class="form-group ">
            <label for="name" class="sr-only">Name</label>
            <input id="name" name="name" class="form-control" placeholder="Name" type="text">
          </div>
          <div class="form-group ">
            <label for="uname" class="sr-only">Type</label>
            <input id="uname" name="type" class="form-control" placeholder="Type : Veg/Non-veg" type="text">
          </div>
          <div class="form-group ">
            <label for="desc" class="sr-only">Decription</label>
            <input id="desc" name="desc" class="form-control" placeholder="Decription : Starter/Sweet/Main Course/..." type="text">
          </div>
          <div class="form-group ">
            <label for="price" class="sr-only">Cost</label>
            <input id="price" name="price" class="form-control" placeholder="Cost : " type="text">
          </div>
          <div class="form-group ">
            <label for="avail" class="sr-only">Availability</label>
            <input id="avail" name="avail" class="form-control" placeholder="Availability : Available/Unavailable" type="text">
          </div>
                <div class="form-group ">
            <label for="image" class="sr-only">Image</label>
            <input type="file" autocomplete="off" name="image" id="image"  class="form-control" placeholder="Select image file"/>
          </div>
          <div class="form-group ">
            <input class="btn btn-primary" name="addDish" value="submit" type="submit">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>