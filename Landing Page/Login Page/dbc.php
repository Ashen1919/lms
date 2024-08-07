<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saegislibrary";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Example query (optional)
$sql = "SELECT studentID, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "studentID: " . $row["studentID"]. " - Name: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
