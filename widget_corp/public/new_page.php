<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php confirm_login(); ?>
<?php find_selected_page(); ?>
<div id="main">
  <div id="navigation">
    <?php echo navigation($current_subject,$current_page); ?>
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>
    <h2>Create Page</h2>

    <form class="" action="create_page.php" method="post">
      <p style="display: none;">Subject:
      <input type="text" name="subject_id" value="<?php echo htmlentities($current_subject["id"]);?>" readonly>
      </p>

      <p>Page name:
        <input type="text" name="menu_name" value="">
      </p>

      <p>Position:
        <select class="" name="position">
        <?php
        $page_set = find_pages_for_subject($current_subject["id"]);
        $page_count = mysqli_num_rows($page_set);
          for($count = 1; $count <= $page_count + 1; $count++){
            echo "<option value=\"{$count}\">{$count}</option>";
          }
        ?>
        </select>
      </p>
      <p>Visible:
        <input type="radio" name="visible" value="0"> No
        &nbsp;
        <input type="radio" name="visible" value="1" checked> Yes
      </p>
      <p>Content: <br>
        <textarea name="content" rows="20" cols="80"></textarea>
      </p>
      <input type="submit" name="submit" value="Create page">
    </form>
    <br>
    <a href="manage_content.php">Cancel</a>
  </div>
</div>



<?php include("../includes/layouts/footer.php"); ?>
