<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/functions.php"); ?>

<?php
  // v1: simple logout
  // session_start();
  $_SESSION['admin_id'] = null;
  $_SESSION['username'] = null;
  redirect_to("login.php");
?>

<?php
  // v2: destroy session
  // assumes nothing else in session to keep
  // session_start();
  // clears all values in session
  // $_SESSION = array();
  // check if cookie is here
  // if (isset($_COOKIE[session_name()])){
  //  set cookie to nothing and time in the past to expire it
  //  setcookie(session_name(), '', time()-42000, '/');
  // }
  // session_destroy();
  // redirect_to("login.php");
?>
