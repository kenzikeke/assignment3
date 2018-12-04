<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Western Shop - delete a customer</title>
</head>
<body>
<?php include 'connectdb.php'; ?>
<h2> Delete the customer :</h2><br>
<?php
 $whichCustomer=$_POST["customer"];
 $query1='SELECT * FROM customer WHERE customerID='.$whichCustomer.'';
 $getcustomer=mysqli_query($connection,$query1);
 if(!$getcustomer){
        die("database get customer query1 failed.");
 }
 $row=mysqli_fetch_assoc($getcustomer);
 echo $row["customerID"]." ".$row["firstName"]." ".$row["lastName"]."<br>";

 $query2='DELETE FROM customer WHERE customerID='.$whichCustomer.'';
 $delete=mysqli_query($connection,$query2);
 if(!$delete){
        die("database delete  query2 failed.");
 }
 echo "The customer has been removed!";

mysqli_free_result($getcustomer);
 mysqli_close($connection);
?>
</body>
</html>


