<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("../includes/validation_functions.php") ?>

<?php confirm_login(); ?>

<?php
if(isset($_POST['submit'])){
  //Process the form

  // Often these are form values in $_POST
  $username = mysql_prep($_POST['username']);
  $hashed_password = password_encrypt($_POST['password']);

  // validations
  $required_fields = array("username","password");
  validate_presences($required_fields);

  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);

  if(!empty($errors)){
    $_SESSION["errors"] = $errors;
    redirect_to("new_admin.php");
  }

  $query  = "INSERT INTO admins (";
  $query .= " username, hashed_password";
  $query .= ") VALUES (";
  $query .= " '{$username}','{$hashed_password}'";
  $query .= ")";

  $result = mysqli_query($connection, $query);
  // Test if there was a query error
  if($result){
    // Success
    $_SESSION["message"] = "Admin created.";
    redirect_to("manage_admins.php");
  } else {
    // Failure
    $_SESSION["message"] = "Admin creation failed.";
    redirect_to("new_admin.php");
  }

} else {
  // This is probably a GET request
  redirect_to("new_admin.php");
}
?>


<?php if(isset($connection)){mysqli_close($connection);} ?>
