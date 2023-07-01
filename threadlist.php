<?php include "partials/_header.php"; ?>
<?php include "partials/_navbar.php"; ?>
<?php include "partials/_dbconnect.php"; ?>
<style>
  body {
    background-image: url(images/thread-bg.avif);
    background-repeat: repeat-y;
    background-size:contain;
  }

  input:hover {
    border: 2px solid gray;
  }
</style>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $cat_id = $_REQUEST['id'];
  $sql = "SELECT * FROM categories WHERE category_id ='$cat_id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
 
?>

  <div class="container my-3">
    <div class="jumbotron bg-light opacity-75">
      <h1 title="Welcome to <?php echo $row['category_name']; ?> Forums." class="display-4">Welcome to <?php echo $row['category_name']; ?> Forums.</h1>
      <p title="<?php echo $row['category_des']; ?>" class="lead"><?php echo $row['category_des']; ?></p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    </div>
  </div>



  <?php if (!isset($_SESSION['loggedin']) == true) { ?>

    <div class="container">
      <h3 class="text-center text-secondary border border-secondary p-2 inline rounded-pill ">Please login to post comments</h3>
    </div>

  <?php } else {
    
  ?>
    <div class="container ">
      <h3>Post a question:-</h3>
      <form action="threadlist.php" method="post">
        <div class="mb-3">
          <div id="comment" class="form-text">Post your comment here:-</div>
          <input type="text" name="thread_id" value="thread_id" hidden class="hidden">
          <input type="text" maxlength="100" class="form-control mt-2 mb-2 opacity-75" name="title" placeholder="Title" required id="title" aria-describedby="text">
          <input type="text" maxlength="250" class="form-control opacity-75" placeholder="Description" name="des" required id="des" aria-describedby="text">
          <input type="text"  value="<?= $cat_id ?>" hidden name="category_id" required id="des" aria-describedby="text">
          <input type="text"  value="<?= $_SESSION['id']; ?>" hidden name="user_id" id="user_id" aria-describedby="text">
        </div>
        <button type="submit" class="btn btn-secondary">Post</button>
        <button type="button" class="btn btn-secondary" onClick="refreshPage()">Cancel</button>

        <script>
          function refreshPage() {
            window.location.reload();
          }
        </script>
      </form>
    </div>
  <?php } ?>
  <div class="container">
    <h3 class=" p-4 m-2"> Browse Questions :- </h3>
  </div>
  <?php
  $noresult = true;
//  $category_id = 
  $joinsql = "SELECT threads.*, users.username, categories.category_name FROM `threads` 
  INNER JOIN users ON threads.user_id = users.id
  INNER JOIN categories ON threads.category_id = categories.category_id where threads.category_id = '$cat_id'";
  $result = mysqli_query($conn, $joinsql);
  

  
  // $sql = "SELECT * FROM threads WHERE category_id ='$cat_id'";
  // $result = mysqli_query($conn, $sql);
  ?>
  <?php
  while ($row = mysqli_fetch_assoc($result)) {
    $noresult = false;
  ?>

    <div class="container border my-1 ">
      <div class="media">
        <img class="mr-3 rounded-circle" src="images/d-user.jpg" width="50px" alt="Generic placeholder image">
        <div class="media-body">
          <h5 class="mt-2 mb-0 "><a class="text-dark text-break" href="comments.php?id=<?php echo $row['thread_id']; ?>?> "> <?= $row['thread_title']; ?></a></h5>
          <div class="mt-0 mb-4 text-break">
            <h6><?= $row['thread_des'] ?></h6>
            <p class="mb-0 mt-2 ml-5">Commented by :- <em> <?php echo $row['username'] ?></em> at <em> <?php echo $row['dt']; ?></em></p>


          </div>
        </div>
      </div>
    </div>
  <?php
  }
  if ($noresult) { ?>
    <div class="container my-3">
      <div class="jumbotron bg-light opacity-75">
        <h1 class="display-4"> There is nothing to show.</h1>
        <p class="lead">Be the first to post a comment.</p>
        <hr class="my-4">
      </div>
    </div>
<?php };
}
?>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $thread_id = $_REQUEST['thread_id'];
  $title = $_REQUEST['title'];
  $des = $_REQUEST['des'];
  $category_id = $_REQUEST['category_id'];
  $user_id = $_REQUEST['user_id'];
  
  $sql = "INSERT INTO `threads`(`thread_id`, `thread_title`, `thread_des`, `category_id`, `user_id`) VALUES ('$thread_id','$title','$des','$category_id', '$user_id')";
  $result = mysqli_query($conn, $sql);
}
?>
<script>
  window.location.href = "http://localhost/iDiscuss/threadlist.php?id=<?= $category_id ?>";
</script>
<?php include "partials/_footer.php"; ?>