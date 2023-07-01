<?php include "partials/_header.php"; ?>
<?php include "partials/_navbar.php"; ?>
<?php include "partials/_dbconnect.php"; ?>



<div class="container  mt-5" >
    <section class="h-50 text-light bg-dark opacity-50 mb-0"  ><h3 class=" pt-5 pb-5 ml-2 mb-0">Contact Us!!</h3>
    <form action="contact.php" method="post" class="container w-50">
  <div class="mb-3">
      <div>Fill this form and you will get a response call from us within 24 hours!!</div>
    <input type="email" class="form-control" name="email" required placeholder="Enter you e-mail" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <input type="tel" name="phone" maxlength="13" required placeholder="Enter your contact number" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-secondary mb-5">Send</button>
</form>
   
</section>
    <section class="bg-light opacity-50 pt-5 pb-5"><h2>GET IN TOUCH</h2></section>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $sql = "INSERT INTO `contact`( `email`, `phone`) VALUES ('$email','$phone')";
    $result = mysqli_query($conn,$sql);
    ?>
    <script>
    alert("Your contact details has been sent!");
    window.location.href="http://localhost/iDiscuss/contact.php";
    </script>
<?php
}
?>

<?php include "partials/_footer.php"; ?>

