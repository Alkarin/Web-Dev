<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
$username = "";

if(isset($_POST['submit'])){
  //Process the form

  // validations
  $required_fields = array("username","password");
  validate_presences($required_fields);


  if(!empty($errors)){
    $_SESSION["errors"] = $errors;
    redirect_to("login.php");
  } else {
    // Attempt login
    $username = $_POST['username'];
    $password = $_POST['password'];
    $found_admin = attempt_login($username, $password);

    if($found_admin){
      // Success
      // Mark user as logged in
      $_SESSION["admin_id"] = $found_admin["id"];
      $_SESSION["username"] = $found_admin["username"];
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
}
?>

<div id="main">
  <div id="navigation">
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <h2>Login</h2>
    <form class="" action="login.php" method="post" autocomplete="off">
      <p>Username:
        <input type="text" name="username" value="<?php echo htmlentities($username); ?>" autocomplete="off" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" autocomplete="off" />
      </p>
      <input type="submit" name="submit" value="Submit" />
    </form>
  </div>
</div>



<?php include("../includes/layouts/footer.php"); ?>
