<?php
require_once "config/database.php";
require_once "models/Auth.php";

session_start();

$user = new Auth($db);

$loginIsSubmitted = isset($_POST["login"]);
$RegisterIsSubmitted = isset($_POST["register"]);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
$registrationAlert = "";

if ($loginIsSubmitted) 
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    $row = $user->login( $email, $password);

    if($row > 0){
      echo "user exists";
    } else {
      session_destroy();
    }
} else {
  session_destroy();
}

if ($RegisterIsSubmitted) 
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $user->checkEmail($email);

    $adminExist = $user->checkEmail($email);

    if ($adminExist > 0)
    {
        $registrationAlert = "<p style='color:red;'>Email already exist in database</p>";
    }
    else {

    $row = $user->register($name, $address, $phone, $email, $password);
        $registrationAlert = "Admin Successfully registered";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Car Booking</title>
</head>
<body>
  <h1>Hello there!!!</h1>

  <form action="index.php" method="post">

<input type="email" name="email" required placeholder="Email">
<br><br>
<input type="password" name="password" required placeholder="password">
<br><br>

<input type="submit" name="login" value="Login">

  </form>

  <h1>Register</h1>
  <form action="index.php" method="post">
<?php echo $registrationAlert?>
<input type="text" name="name" required placeholder="Name">
<br><br>
<input type="email" name="email" required placeholder="Email">
<br><br>
<input type="text" name="address" required placeholder="Address">
<br><br>
<input type="text" name="phone" required placeholder="Phone">
<br><br>
<input type="password" name="password" required placeholder="password">
<br><br>

<input type="submit" name="register" value="Register">

  </form>
</body>
</html>