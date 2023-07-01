<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body class="bg-body-secondary">

<?php include "partials/_navbar.php";?>
<?php if(isset( $_SESSION['loggedin']) == true){ ?> <script>alert("Succesfully You have been logged in!!")</script> <?php } ?>
<?php if(isset( $_SESSION['loggedout']) == true){ ?> <script>alert("You have been logged out!!")</script> <?php } ?>

<?php include "partials/_slider.php";?>

<style>
  body{
    background-image: url("images/index-bg.jpg") ;
    background-repeat: repeat-y;
    background-size: cover;
  }
</style>


<div class="container"><h3 class="m-5 text-center" title="iDiscuss categories" > iDiscuss categories</h3></div>
<?php include "partials/_dbconnect.php"; ?>
<?php include "categories.php";?>








<?php include 'partials/_footer.php';?>
    
  </body>
</html>
