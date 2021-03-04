<?php
session_start();

$conn=mysqli_connect("localhost","root","","shoppingchart");

if(isset($_POST['add']))
{
 if(isset($_SESSION['shoppingchart'])){
   $item_array_id=array_column($_SESSION['shoppingchart'],'item_id');
   if(!in_array($_GET['id'],$item_array_id))
   {
     $count=count($_SESSION['shoppingchart']);
     $item_array = array(
       'item_id' => $_GET['id'],
       'item_name' => $_POST['hidden_name'],
       'item_price' => $_POST['hidden_price'],
       'item_quantity' => $_POST['quantity'],
     );
     $_SESSION['shoppingchart'][$count]=$item_array;
     echo '<script>window.location="index.php"</script>';
   }

   }else {
    $item_array=array(
      'item_id' => $_GET['id'],
      'item_name' => $_POST['hidden_name'],
      'item_price' => $_POST['hidden_price'],
      'item_quantity' => $_POST['quantity'],
    );

    $_SESSION['shoppingchart'][0]=$item_array;
   }
 }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Shopping Chart</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="stylesheet/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </head>
  <body>
<div class="container" style="width: 65%">
    <h2>Shopping Cart</h2>
  <?php
  $sql="SELECT * FROM products;";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result))
  {
    //echo $row["id"]." ".$row['name']. " ".$row['image']." ".$row['price']."<br>";
  ?>

  <div class="gallery">
    <form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
      <img src="images/<?php echo $row['image'] ?>" class="center">
      <h5 class="text-center"><?php echo $row['name']; ?></h5>
      <h6 class="text-center">Price $<?php echo $row['price']; ?></h6>
     <input type="number" name="quantity" class="form-control" value = 1>
      <input type="hidden" name="hidden_name" value="<? php echo $row['name']?>">
      <input type="hidden" name=hidden_price" value="<? php echo $row['price'] ?>">
      <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
    </form>
  </div>

    <?php
    }

     ?>

<div style="clear: both"></div>
<h3 class="title2">Shopping Cart Details</h3>
<div class="table-responsive">
<table class = "table table-borded">
  <tr>
    <th width="30%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="13%">Price Details</th>
    <th width="10%">Total Price</th>
    <th width= "17%">Remove Items</th>
  </tr>

<?php
if(!empty($_POST['shoppingchart']))
{
  $total=0;
  foreach ($_SESSION['shoppingchart'] as $key => $value)
  {
    ?>

<tr>
  <td><?php echo $value['item_name']; ?></td>
  <td><?php echo $value['item_quantity']; ?></td>
  <td><?php echo $value['item_price']; ?></td>
  <td><?php number_format($value['item_price']*$value['item_quantity']); ?></td>
  <td><a href = "index.php?action=delete&id=<<?php echo value['id']; ?>">Remove</td>

</tr>
  <?php
    // code...
  }
}

 ?>

</table>
</div>

</div>
</body>
</html>
