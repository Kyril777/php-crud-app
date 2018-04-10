<?php

include "action.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- JQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript. -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="" type="text/css" />
  </head>
  <body>

    <!-- Jumbotron container. -->
    <div class="container">
      <div class="jumbotron">
        <h1>Medicine Stock <small>RK Tutorial</small></h1>
      </div>
    </div>

    <!-- Our form. -->
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Enter T-Shirt Details</div>
            <div class="panel-body">
              <?php
                if(isset($_GET["update"])){
                  $id = $_GET["id"] ?? null;
                  $where = array("id"=> $id,);
                  $row = $obj->select_record("t_shirts",$where);
              ?>

              <!-- Where we update/ammend the items. -->
              <form method="post" action="action.php">
                <table class="table table-hover">
                  <tr>
                    <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                  </tr>
                  <tr>
                    <td>T-Shirt Name</td>
                    <td><input type="text" class="form-control" value="<?php echo $row["shirt_name"]; ?>" name="name" placeholder="Enter Medicine Name"></td>
                  </tr>
                  <tr>
                    <td>Quantitiy</td>
                    <td><input type="text" class="form-control" name="qty" value="<?php echo $row["qty"]; ?>" placeholder="Enter Quantity"></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center"><input type="Submit" name="edit" class="btn btn-primary" value="Update"></td>
                  </tr>
                </table>
              </form>
              <?php
              } else {
              ?>

              <!-- Where we store the items. -->
              <form method="post" action="action.php">
                <table class="table table-hover">
                  <tr>
                    <td>T-Shirt Name</td>
                    <td><input type="text" class="form-control" name="name" placeholder="Enter Medicine Name"></td>
                  </tr>
                  <tr>
                    <td>Quantitiy</td>
                    <td><input type="text" class="form-control" name="qty" placeholder="Enter Quantity"></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" class="btn btn-primary" value="Store"></td>
                  </tr>
                </table>
              </form>

              <?php
                }
              ?>

              </div>
            </div>
          </div>
          <div class="col-md-3"></div>
      </div>
    </div>

    <!-- Table that will display our records. -->
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <table class="table table-bordered">
            <tr>
              <th>#</th>
              <th>T-Shirts</th>
              <th>Available Stock</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
            <?php
              $myRow = $obj->fetch_record("t_shirts");
              foreach($myRow as $row) {
            ?>
                <tr>
                  <td><?php echo $row["id"]; ?></td>
                  <td><?php echo $row["shirt_name"]; ?></td>
                  <td><b><?php echo $row["qty"]; ?></b></td>
                  <td><a href="index.php?update=1&id=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a></td>
                  <td><a href="action.php?delete=1&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php
              }
            ?>
          </table>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>

  </body>
</html>
