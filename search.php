<?php include "partials/_header.php"; ?>
<?php include "partials/_navbar.php"; ?>
<style>
  .footer-margin{
    margin-top: 175px;
  }
</style>
<div class="container ">
  <h3 class="my-5 text-secondary"> Results for your search <em>"<?php echo $_GET['search']; ?>"</em> is -</h3>
</div>
</div>

<?php
$search = $_GET['search'];
$noresult = true;
$sql = "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_des) against ('$search')";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
 $noresult = false;
 ?>
<div class="container border my-1 ">
<div class="media">
  <div class="media-body">
    <h5 class="mt-2 mb-0 "><a class="text-dark text-break" href="comments.php?id=<?php echo $row['thread_id']; ?>?> "> <?= $row['thread_title']; ?></a></h5>
    <div class="mt-0 mb-4 text-break">
      <h6><?= $row['thread_des'] ?></h6>
    </div>
  </div>
</div>
</div>

    <?php
  }
  if($noresult){ ?>
   <div class="container my-3">
      <div class="jumbotron bg-light opacity-75">
        <h3 class="display-4"> There is no results for your search "<em><?php echo $_GET['search']; ?></em>".</h3>
        <hr class="my-4">
      </div>
    </div>
<?php
  }
?>
<div class="footer-margin">
  <?php include "partials/_footer.php"; ?>
  </div>


 