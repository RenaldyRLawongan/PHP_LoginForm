<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" type="text/css" href="style.css">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Berhasil Login</title>
</head>
<body>
    <div class="container-logout">
  <form action="" method="POST" class="login-email">
   <?php echo "<h1>Welcome Page, Hi " . $_SESSION['username'] ."!". "</h1>"; ?>
   
   <!--<img src="<?= $_SESSION['avatar'] ?>" class="img-thumbnail" alt="">-->
   <br>
   <div class="input-group">
            <a href="logout.php" class="btn">Logout Account</a>
   </div>
  </form>
 </div>
</body>
</html>