<?php
$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($page_title) ? $page_title : "Processing"; ?></title>

    <!-- Bootstrap CSS -->
     <link href="libs/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <script src="js/jquery-1.10.2.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/bootstrap.min.js"></script>
    <!---  <link rel="stylesheet" href="stylesheet/bootstrap.min.css">--->
      <link href = "stylesheet/jquery-ui.css" rel = "stylesheet">
      <link href="stylesheet/style.css" rel="stylesheet">

    <!-- custom css for users -->
    <link href="libs/css/user.css" rel="stylesheet" media="screen">
  </head>
  <body>
        <?php include 'navigation.php'; ?>
        <!-- container -->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="page-header">
                        <h1><?php echo isset($page_title) ? $page_title : "Processing"; ?></h1>
                    </div>
                </div>
