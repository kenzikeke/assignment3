<?php
$query = "SELECT  * FROM customer GROUP BY lastName";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "Who are you looking up?</br>";
while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="customer" value=" ';
    echo $row["customerID"];
    echo'">'. $row["firstName"] ." ".$row["lastName"]."   :   ".
    $row["customerID"]." - ".$row["city"]." - ".$row["phone"]. "<br>";
}
mysqli_free_result($result);
mysqli_close($connection);

echo "</ol>";
?>
