<?php include "partials/_dbconnect.php" ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password = '$password' ";
    $result = mysqli_query($conn, $sql);
    $userexist = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
    if ($userexist == 1) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        ?>
        <script>
            alert("You have been logged in");
        </script>
    <?php header("location:index.php");
    } else { ?>

        <script>
            alert("Incorrect username or password!!");
            window.location.href="http://localhost/iDiscuss/index.php";
        </script>
<?php
    }
}
?>