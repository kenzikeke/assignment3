<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Western Shop - new order</title>
</head>
<body>
<?php include 'connectdb.php'; ?>
<h1> Here is your new order:</h1><br>

<?php
 $whichCustomer=$_POST["customer"];
 $product = $_POST["product"];
 $quantity = $_POST["quantity"];
 $query1='SELECT * FROM product WHERE productID="'.$product.'"';
 $getstock=mysqli_query($connection,$query1);
 if(!$getstock){
	die("database get stock query failed.");
 }
 $stock=mysqli_fetch_assoc($getstock); 
 echo $stock["productID"];
 if($quantity>$stock["instock"]){
 echo"There is no enough stock for your order.".'<br>';
 echo "The product has " . $stock["instock"] ." in stock,please retry.";
 }
 else{
  $query2='SELECT * FROM purchased WHERE customerID="'.$whichCustomer.'" AND productID="'.$product.'"';
  $getcustomer=mysqli_query($connection,$query2);
  $row = mysqli_fetch_assoc($getcustomer);
  if($whichCustomer==$row["customerID"] and $product==$row["productID"]){

 	 $newNumber=$quantity+$row["number"];
echo $newNumber.'<br>';
        $query5='UPDATE purchased SET number='.$newNumber.' WHERE customerID="'.$whichCustomer.'" AND productID="'.$product.'"';
echo "Purchased";
        mysqli_query($connection,$query5);
echo "Yes!";

  }
  else{
 echo "Not purchased before".'<br>';
  
}
	$newStock=$stock["instock"]-$quantity;
	$query4='UPDATE product SET instock="'.$newStock.'" WHERE productID="'.$product.'"';
        mysqli_query($connection,$query4);

  echo "You have made a new order!"; 
}


 mysqli_free_result($getstock);
 mysqli_close($connection);
?>
</body>
</html>
