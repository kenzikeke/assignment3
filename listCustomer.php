<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Western Shop - list customer</title>
</head>
<body>
<?php include 'connectdb.php';?>
<h1>Here are the customer who bout certain number of products :</h1>
<ol>
<?php
	$number=$_POST["quantity"];
	$query1='SELECT * FROM purchased WHERE number >'.$number.'';
	$result=mysqli_query($connection,$query1);
	if (!$result) {
       		 die("database query1 failed.");
     	}
    	while ($row=mysqli_fetch_assoc($result)) {
        	echo '<li>';
		$customer=$row["customerID"];
		$product=$row["productID"];
		$quantity=$row["number"];
	   $query2='SELECT * FROM customer, product WHERE customerID='.$customer.' AND productID='.$product.'';
	   $result2=mysqli_query($connection,$query2);
           if (!$result2) {
                 die("database query2 failed.");
           }
	   $row1=mysqli_fetch_assoc($result2);
	   echo $row1["firstName"]." ". $row1["lastName"]." - ".$row1["description"]." - ".$quantity;

     	}
	 mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>

