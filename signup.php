<?php
    $isSignup = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "partials/_dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $existsql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $existsql);
    $exists = mysqli_num_rows($result);
    if ($exists > 0) { ?>
        <script>
            alert("Username already exists!!");
            window.location.href="http://localhost/iDiscuss/index.php";
        </script>
        <?php } else {

        if ($password == $cpassword) {
            $sql = "INSERT INTO `users` (`id`, `username`, `password`, `dt`) VALUES (NULL, '$username', '$password', current_timestamp())";

            $result = mysqli_query($conn, $sql);
            $isSignup = true;
        ?>

        <?php } else { ?>
            <script>
                alert("Mismatch password");
            </script>
<?php
        }
    }
}
?>
<?php if ($isSignup == true) {
?>
    <script>
        alert("You have been signed up!!");
        window.location.href = "http://localhost/iDiscuss/index.php";
    </script>

<?php
} ?>