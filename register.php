<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = md5($_POST['password']);
 $cpassword = md5($_POST['cpassword']);
 $phone_number = $_POST['phone_number'];
 $direktori = './images/';
 $file_name = $_FILES['profile']['name'];
 move_uploaded_file($_FILES['profile']['tmp_name'],$direktori.$file_name);
 $sql = "INSERT INTO users (image) VALUES ('$file_name')";
 $file_name = "";

 if ($password == $cpassword) {
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if (!$result->num_rows > 0) {
   $sql = "INSERT INTO users (username, email, password, phone_number)
     VALUES ('$username', '$email', '$password', '$phone_number')";
   $result = mysqli_query($conn, $sql);
   if ($result) {
    echo "<script>alert('Congratulations, successful registration!')</script>";
    $username = "";
    $email = "";
    $_POST['password'] = "";
    $_POST['cpassword'] = "";
    $phone_number = "";
   } else {
    echo "<script>alert('Woops! There is an error.')</script>";
   }
  } else {
   echo "<script>alert('Woops! Email Already Registered.')</script>";
  }
  
 } else {
  echo "<script>alert('Invalid Password.')</script>";
 }
}

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" type="text/css" href="style.css">

 <title>Back-End Login Form</title>
</head>
<body>
 <div class="container">
  <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
   <div class="input-group">
    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
   </div>
   <div class="input-group">
    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
   </div>
   <div class="input-group">
    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
    <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
   </div>

   <div class="input-group">
    <input type="tel" placeholder="Phone Number" name="phone_number" value="<?php echo $phone_number; ?>" required class="form-control">
  </div>
  <label for="">Profile picture</label>
  <input class="form-control form-control-sm" id="formFileSm" type="file" name="profile">

   <div class="input-group">
     <br>
    <button name="submit" class="btn">Register</button>
   </div>
  <br>
   <p class="login-register-text">If you want to login, click here! <a href="index.php">Login </a></p>
  </form>
 </div>
</body>
</html>