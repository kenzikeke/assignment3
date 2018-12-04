<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western Shop-Your Purchased</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are your items:</h1>
<ol>
<?php
   $whichCustomer= $_POST["customer"];
   $query = 'SELECT * FROM purchased,customer,product WHERE customer.customerID = '.$whichCustomer.' AND product.productID=purchased.productID AND purchased.customerID=customer.customerID ';
   $result=mysqli_query($connection,$query);
   if (!$result) {
      die("database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
       echo '<li>';
        echo $row["description"].'<br>';
	echo '</li>';
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
