<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western Shop-product sales information</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are the sales information: </h1>
<?php
 $product=$_POST["product"];
 $query='SELECT * FROM purchased WHERE productID='.$product.'';
 $result =mysqli_query($connection,$query);
 if (!$result) {
      die("database query failed.");
 }
 $quantity;
 while ($row=mysqli_fetch_assoc($result)) {
       $quantity=$quantity+$row["number"];
 }
 $query2='SELECT * FROM product WHERE productID='.$product.'';
 $result2=mysqli_query($connection, $query2);
 if(!$result2){
	die("query2 dailed");
 }
 $row2=mysqli_fetch_assoc($result2);
 $total=$quantity * $row2["cost"];
 echo $row2["description"].'<br>';
 echo $quantity." orders, money made in total: ".$total;
 mysqli_free_result($result);

?>
</body>
</html>
