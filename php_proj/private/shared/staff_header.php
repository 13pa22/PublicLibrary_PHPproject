<?php
  if(!isset($page_title)) { $page_title = 'Klienberg Public Library'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>KPL - <?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>KPL: Staff Menu</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/staff/index.php'); ?>">Staff Main Menu</a></li>
      </ul>
      <ul>
        <li><a href="<?php echo url_for('/index.php'); ?>">Public Main Menu</a></li>
      </ul>
    </navigation>
