<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php confirm_login(); ?>
<div id="main">
  <div id="navigation">
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>
    <h2>Create Admin</h2>

    <form class="" action="create_admin.php" method="post" autocomplete="off">
      <p>Username:
        <input type="text" name="username" value="" autocomplete="off">
      </p>
      <p>Password:
        <input type="password" name="password" value="" autocomplete="off">
      </p>
      <input type="submit" name="submit" value="Create Admin">
    </form>
    <br>
    <a href="manage_admins.php">Cancel</a>
  </div>
</div>



<?php include("../includes/layouts/footer.php"); ?>
