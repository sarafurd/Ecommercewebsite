<?php
$dbServerName="localhost";
$dbUserName="root";
$dbPassword="";
$dbName="shoppingchart";

$conn=mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

if(isset($_POST['add']))
{
  print_r($_POST['id']);
 if(isset($_SESSION['shoppingchart'])){
   $item_array_id=array_column($_SESSION['shoppingchart'],column:"product_id");
   if(!in_array($_GET['id'],$item_array_id))
   {
     $count=count($_SESSION['shoppingchart']);
     $item_array = array(
       'product_id' => $_GET['id'],
       'item_name' => $_POST['hidden_name'],
       'product_id' => $_POST['hidden_price'],
       'item_quantity' => $_POST['quantity'],
     );
     $_SESSION['shoppingchart'][$count]=$item_array;
     echo '<script> window.location="index.php"</script>';
   } else {
       echo '<script>alert("Product is already Added to Cart")</script>';
       echo '<script>window.location="index.php"</script>';
     }

   }else {
    $item_array=array(
      'product_id' => $_GET['id'],
      'item_name' => $_POST['hidden_name'],
      'product_id' => $_POST['hidden_price'],
      'item_quantity' => $_POST['quantity'],
    );

    $_SESSION['shoppingchart'][0]=$item_array;
   }
 }
