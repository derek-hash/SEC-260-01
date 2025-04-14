<?php
// Set the vars used for your DB connection
$username="derek.aquino";  // Replace with your created username
$password="B@seball112104";  // Replace with your password
$database="pets";

// Acquire the Owner's last name from your html POST
$owner=$_POST['owner'];

// Establish MySQL connection called $mysqli
$mysqli=new mysqli('localhost',$username,$password,$database);

// Define your query - pay close attention to ' and "!
$query="SELECT * from cats where owner='".$owner."'";

// Run query - result is returned as a resource id
// If query has error, *LINE* will print the error from mysql
$result=$mysqli->query($query) or die($mysqli->error.__LINE__);

// Resource id results must be interpreted
// This while loop will run through the results row by row & echo all fields
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "Name: ".$row['name']."</br>";
        echo "Owner: ".$row['owner']."</br>";
        echo "Birth: ".$row['birth']."</br>";
        echo "Death: ".$row['death']."</br>";
        echo "Species: ".$row['species']."</br>";
        echo "Sex: ".$row['sex']."</br>";
        echo "<hr>";  // Add a horizontal line between records
    }
} else {
    echo 'NO RESULTS';
}
?>