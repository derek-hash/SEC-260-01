<?php
// Set the vars used for your DB connection
$username="youruser";  // Replace with your created username
$password="yourpassword";  // Replace with your password
$database="pets";

// Acquire the Cat's name from your html POST
$name=$_POST['name'];

// Establish MySQL connection called $mysqli
$mysqli=new mysqli('localhost',$username,$password,$database);

// Define your query - pay close attention to ' and "!
$query="SELECT * from cats where name='".$name."'";

// Run query - result is returned as a resource id
// If query has error, *LINE* will print the error from mysql
$result=$mysqli->query($query) or die($mysqli->error.__LINE__);

// Resource id results must be interpreted
// This while loop will run through the results row by row & echo name & birth fields
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo $row['name']."'s birthday is ".$row['birth']."</br>";
    }
} else {
    echo 'NO RESULTS';
}
?>