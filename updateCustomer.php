<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Western Shop - update phone number</title>
</head>
<body>
<?php include 'connectdb.php'; ?>
<h2> Here is your new phone number:</h2><br>
<?php
 $whichCustomer=$_POST["customer"];
 $phone = $_POST["phone"];
 $query1='SELECT * FROM customer WHERE customerID="'.$whichcustomer.'"';
 $getcustomer=mysqli_query($connection,$query1);
 if(!$getcustomer){
        die("database get customer query1 failed.");
 }
 $row=mysqli_fetch_assoc($getcustomer);
 if(strlen($phone)>8){
 	echo "The phone entered is invalid, please retry.".'<br>';
 }
 else{
 $query2 ='UPDATE customer SET phone= "'.$phone.'" WHERE customerID='.$whichCustomer.''; 
 if(!mysqli_query($connection,$query2)){
	die("update phone failed");
 }
 echo "You have updated the phone number to: ";
 echo $phone;
 }
mysqli_free_result($getcustomer);
 mysqli_close($connection);
?>
</body>
</html>


