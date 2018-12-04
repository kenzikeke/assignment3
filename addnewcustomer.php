<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Western Shop - new order</title>
</head>
<body>
<?php include 'connectdb.php'; ?>
<h1> Here is new customer's information:</h1><br>
<?php
 $fname=$_POST["fname"];
 $lname=$_POST["lname"];
 $city=$_POST["city"];
 $phone=$_POST["phone"];
 echo $fname." ".$lname." ". $city." ".$phone."<br>";
 $query='SELECT MAX(customerID) AS maxid FROM customer';
 $result=mysqli_query($connection,$query);
 if(!$result){
	die("database max quary failed.");
 }
 $row=mysqli_fetch_assoc($result);
 $newID=intval($row["maxid"])+1;
 $ID=(string)$newID;
 $agentID=(string)11;
 $query1='INSERT INTO customer VALUES("'.$ID.'","'.$fname.'","'.$lname.'","'.$city.'","'.$phone.'","'.$agentID.'")'; 
 if(!mysqli_query($connection,$query1)){
	die("Error:insert failed".mysqli_error($connection));
 }
 echo "New customer was added!";
 mysqli_close($connection);
?>
</body>
</html>






































































































































