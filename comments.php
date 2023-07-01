<?php include "partials/_header.php"; ?>
<?php include "partials/_navbar.php"; ?>
<?php include "partials/_dbconnect.php"; ?>
<style>
  body {
    background-image: url(images/thread-bg.avif);
    background-repeat: repeat-y;
    background-size: cover;
  }
</style>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $thread_id = $_REQUEST['id'];
  $sql = "SELECT * FROM threads WHERE thread_id ='$thread_id'";
  
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

?>
  <div class="container my-3">
    <div class="jumbotron bg-light opacity-75">
      <h1 class="display-4"> <?php echo $row['thread_title']; ?></h1>
      <p class="lead"><?php echo $row['thread_des']; ?></p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
     
      <!-- <p class="lead">
        Posted by <em><?= $row['username'] ?></em>
      </p> -->
    </div>
  </div>
  <?php if (!isset($_SESSION['loggedin']) == true) { ?>

    <div class="container">
      <h3 class="text-center text-secondary border border-secondary p-2 inline rounded-pill ">Please login to post comments</h3>
    </div>

  <?php } else {
  ?>
    <div class="container">
      <h3>Post a question:-</h3>
      <form action="comments.php" method="post">
        <div class="mb-3">
          <div id="comment" class="form-text">Post your comment here:-</div>
          <input type="text" maxlength="250" required class="form-control opacity-75" name="comment" id="comment" aria-describedby="text">
          <input type="hidden" required name="thread_com_id" value="<?= $thread_id ?>" id="thread_com_id" >
        </div>
        <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="user_id" required id="user_id" >

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
  // $sql = "SELECT * FROM comments WHERE thread_id ='$thread_id'";
  $joinsql = "SELECT comments.*, users.username, threads.category_id FROM `comments` 
  INNER JOIN users ON comments.user_id = users.id
  INNER JOIN threads ON comments.thread_id = threads.category_id where comments.thread_id ='$thread_id'";
  $result = mysqli_query($conn, $joinsql);
  ?>
  <?php
  while ($row = mysqli_fetch_assoc($result)) {
    $noresult = false;
  ?>

    <div class="container  border my-1 ">
      <div class="media">
        <img class="mr-3 rounded-circle" src="images/d-user.jpg" width="50px" alt="Generic placeholder image">
        <div class="media-body">
          <div class="mt-0 mb-4  text-break">
            <h6><?= $row['thread_comment'] ?></h6>
            <p class="mb-0 mt-2 ml-5">Commented by :- <em> <?php echo $row['username']; ?></em> at <em> <?php echo $row['comment_time']; ?></em></p>


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
  $comment = $_REQUEST['comment'];
  $user_id = $_REQUEST['user_id'];
  $thread_com_id = $_REQUEST['thread_com_id'];
  $sql = "INSERT INTO `comments`(`thread_comment`,`thread_id`,`user_id`) VALUES ('$comment','$thread_com_id','$user_id')";
  $result = mysqli_query($conn, $sql);

?>
<?php
}
?>
<script>
  window.location.href = "http://localhost/iDiscuss/comments.php?id=<?=$thread_com_id?>";
</script>
<?php include "partials/_footer.php"; ?>