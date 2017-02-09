<?php
  if(!isset($layout_context)){
    $layout_context = "public";
  }
?>
<!DOCTYPE html Public "HTML TEMPLATE">

<html lang="en">
  <head>
    <title>Widget Corp <?php if($layout_context == "admin") { echo "Admin"; } ?></title>
    <link rel="stylesheet" href="css/master.css" media="all" title="no title" type="text/css" charset="utf-8">
  </head>
  <body>
    <div id="header">
      <h1>Widget Corp <?php if($layout_context == "admin") { echo "Admin"; } ?></h1>
    </div>
