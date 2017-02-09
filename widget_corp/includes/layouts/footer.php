<div id="footer">Copyright <?php echo date("Y"); ?>, Widget Corp</div>
</body>
</html>
<?php
if(isset($connection)){
  // 5. Close database connection
  mysqli_close($connection);
}
?>
