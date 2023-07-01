<?php
include "partials/_dbconnect.php";
$sql = "SELECT * FROM `categories`";
$result = mysqli_query($conn, $sql);
?>
<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">



<?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <div class="col">
    <div class="card shadow">
      <img src="https://source.unsplash.com/random/?<?=$row['category_name'];?>/coding" height="280" width="70" class="card-img-top" alt="...">
      <div class="card-body bg-light">
        <h5 class="card-title" title="<?= $row['category_name']; ?>"><?= $row['category_name']; ?></h5>
        <p class="card-text" title="<?= $row['category_des']; ?>"><?= $row['category_des']; ?></p>
        <button class="btn btn-secondary"><a class="text-decoration-none text-light" title="View thread" href="threadlist.php?id=<?php echo $row['category_id']; ?>"> View thread </a></button>
      </div>
    </div>
  </div>

<?php } ?>
</div>

