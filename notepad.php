<?php
// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pets";

// Get the cat name from the form submission
$name = $_POST['name'];

// Create database connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare the SQL statement with a placeholder (?)
$stmt = $mysqli->prepare("SELECT birth FROM cats WHERE name=?");

// Bind the parameter to the placeholder
$stmt->bind_param('s', $name);

// Execute the prepared statement
$stmt->execute();

// Bind the result to a variable
$stmt->bind_result($birth);

// Store the result so we can check if there are any rows
$stmt->store_result();

// Check if we have any results
if ($stmt->num_rows > 0) {
    // Fetch the results in a loop
    while ($stmt->fetch()) {
        echo "<h2>" . htmlspecialchars($name) . "'s birthday is " . htmlspecialchars($birth) . "</h2>";
    }
} else {
    echo "<h2>No Results</h2>";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>