<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Western Shop - all item</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are all products we have:</h1>
<ol>
<?php
   $whichOrder= $_POST["Order"];
   if ($whichOrder =="asending")
   {
   $query = 'SELECT * FROM product ORDER BY description ASC';
   }
   else{ 
   $query = 'SELECT * FROM product ORDER BY description DESC';
   }

   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["description"];
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
