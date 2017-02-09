<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php confirm_login(); ?>
<div id="main">
  <div id="navigation">
    <br>
    <a href="admin.php">&laquo; Main menu</a><br>
  </div>
  <div id="page">
    <?php echo message(); ?>

      <h2>Manage Admins</h2>
      <table border="0" cellpadding="1" cellspacing="0">
        <tr>
          <td class="users"><strong>Username</strong></td>
          <td class="actions"><strong>Actions</strong></td>
        </tr>
        <?php
          // for each Admin add row
          $admin_set = find_all_admins();
          while($admin = mysqli_fetch_assoc($admin_set)){
            echo "<td>";
            $safe_admin_username = urlencode($admin["username"]);
            echo $safe_admin_username;
            echo "</td>";

            //show edit link
            echo "<td>";
            $display = "<a href=\"edit_admin.php?id=";
            $safe_admin_id = urlencode($admin["id"]);
            $display .= $safe_admin_id;
            $display .= "\">Edit</a>";
            echo $display;
            echo "&nbsp;";

            //show delete link
            $display = "<a href=\"delete_admin.php?id=";
            $safe_admin_id = urlencode($admin["id"]);
            $display .= $safe_admin_id;
            $display .= "\" onclick="."\"return confirm('Are you sure?');\"";
            $display .= ">Delete</a>";
            echo $display;
            echo "</td>";
            echo "</tr>";
          }
        ?>
      </table>
      <br>
      <a href="new_admin.php">Add new admin</a>
  </div>
</div>



<?php include("../includes/layouts/footer.php"); ?>
