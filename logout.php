<?Php 
session_start();
?>
<?php
$_SESSION['loggedout'] = false;
session_unset();
session_destroy();
if(session_unset() && session_destroy()){
 $_SESSION['loggedout'] = true;
}
?>
<script>alert("You have been logged out...");
window.location.href="http://localhost/iDiscuss/index.php"</script>
<?php
// header("location: http://localhost/iDiscuss/index.php");
exit();
?>