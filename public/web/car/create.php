<?php 
    // define("TITLE", "Car | Luxury Cars");

  include_once '../config/database.php';
  include_once '../models/car.php';

  // Instantiate Car object
  $car = new Car($db);

  // if the form was submitted
  if($_POST) {
    // set car property values
    $car->name = $_POST['name'];
    $car->models = $_POST['models'];
    $car->numberPlate = $_POST['numberPlate'];
    $car->fee = $_POST['fee'];

    // create the car
    if($car->createCar()) {
      echo "<div class='alert alert-success' role='alert'>Car Created</div>";
    } else {
      echo "<div class='alert alert-danger' role='alert'>Unable To create Car</div>";
    }
  }
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div class="container">
  <div class="row">
    <div class="col-md-10 py-3">
      <div class="form-group">
        <label for="Name"><strong>Name</strong></label>
        <input type="text" name="name" class="form-control" placeholder="Enter Car Name">
        <label for="Model"><strong>Car Model</strong></label>
        <input type="text" name="models" class="form-control" placeholder="e.g., Toyota Corolla envelop 2017">
        <label for="Number Plate"><strong>Number Plate</strong></label>
        <input type="text" name="numberPlate" class="form-control" placeholder="Enter Number Plate">
        <label for="Fee"><strong>Fee</strong></label>
        <input type="text" name="fee" class="form-control" placeholder="Enter Car Fee">
        <hr>
        <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
      </div>
    </div>
  </div>
  </div>
</form>