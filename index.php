<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Western Shop  </title>
</head>
<body>
<?php include 'connectdb.php'; ?>
<h1>Welcome to the Western Shop</h1>
<h2>Our customer:</h2>
<form action="getitem.php" method="post">
<?php  include 'getcustomer.php'; ?>
<input type="submit" value="Purchased item">
</form>

<p>
<hr>
<p>
<h2>In what order you want for viewing all products?</h2> 
<form action="getAllItem.php" method="post"> 
<input type = "radio" name = "Order" value = "asending">Asending Order <br>
<input type = "radio" name = "Order" value = "desending">Desending Order<br> 
<input type="submit" value="view all item">
</form>

<p>
<hr>
<p>
<?php include 'connectdb.php'; ?>
<h2>Add a new purchase</h2>
<form action = "newOrder.php" method="post">
<?php
include 'getcustomer.php';
?>
<br>
<?php include 'connectdb.php';
$query = "SELECT * From product GROUP BY description";
$result = mysqli_query($connection, $query);
if (!result){
        die("database query faild.");
}
echo "which product? </br>";
while($row = mysqli_fetch_assoc($result)){
        echo '<input type = "radio" name="product" value=" ';
        echo $row["productID"];
        echo' ">' . $row["description"]." -in stock:   ".$row["instock"]. "<br>";
}
mysqli_free_result($result);
mysqli_close($connection);
?>
Quantity:<input type="text" name="quantity"> <br>
<input type="submit" value="make a new order">
</form>

<p>
<hr>
<p>
<h2>Add a new customer</h2>
<form action ="addnewcustomer.php" method="post">
First Name:<input type="text" name="fname"> <br>
Last Name:<input type="text" name="lname"> <br>
Phone: <input type="text" name="phone"> <br>
City: <input type="text" name="city"> <br>
<input type="submit" value="add customer">
</form>

<p>
<hr>
<p>
<h2>Update a customer's phone number:</h2>
<?php include 'connectdb.php'; ?>

<form action ="updateCustomer.php" method ="post">
<?php include 'getcustomer.php'; ?>
New Phone:<input type="text" name="phone"><br>
<input type="submit" value="update">
</form>
<p>
<hr>
<p>
<h2>Delete a customer:</h2>
<?php include 'connectdb.php'; ?>
<form action ="deleteCustomer.php" method ="post">
<?php include 'getcustomer.php'; ?>
<input type="submit" value="delete">
</form>

<p>
<hr>
<p>
<h2>Customer purchased with certain quantity:</h2>
<form action ="listCustomer.php" method ="post">
Entry a quantity for searching:<input type="text", name="quantity"><br>
<input type="submit" value="List Customers">
</form>

<p>
<hr>
<p>
<h2>Products never been purchased:</h2>
<?php include 'connectdb.php'; 
 $query ='SELECT * FROM product WHERE productID NOT IN (SELECT productID FROM purchased)';
 $result = mysqli_query($connection, $query);
 if (!result){
        die("database query faild.");
 }
 echo "  product: </br>";
 echo '<ol>';
 while($row = mysqli_fetch_assoc($result)){
	echo '<li>';
	echo $row["description"].'<br>';
 }
 echo'</li>'.'</ol>';
 mysqli_free_result($result);
 mysqli_close($connection);
?>

<p>
<hr>
<p>
<h2>Get product sales information:</h2>
<form action ="productInfo.php" method ="post">
Which product you want to see?<br>
<?php include 'connectdb.php';
 $query = "SELECT * From product GROUP BY description";
 $result = mysqli_query($connection, $query);
 if (!result){
        die("database query faild.");
 }
 while($row = mysqli_fetch_assoc($result)){
        echo '<input type = "radio" name="product" value=" ';
        echo $row["productID"];
        echo' ">' . $row["description"]. "<br>";
 }
 mysqli_free_result($result);
 mysqli_close($connection);
?>
<input type="submit" value="Get Information">
</form>


</body>
</html>
