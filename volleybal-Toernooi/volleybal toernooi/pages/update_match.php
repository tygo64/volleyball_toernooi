<?php
// Connect to your database
$servername = "localhost";
$username = "your_username"; // Replace with your MySQL username
$password = "your_password"; // Replace with your MySQL password
$dbname = "volleybal_club"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare data from POST request
$wedstrijdId = $_POST['wedstrijdId'];
$veld = $_POST['veld'];
$team1 = $_POST['team1'];
$team2 = $_POST['team2'];
$tijd = $_POST['tijd'];

// Update query
$sql = "UPDATE wedstrijden SET veld = ?, team1 = ?, team2 = ?, tijd = ? WHERE wedstrijdId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssi", $veld, $team1, $team2, $tijd, $wedstrijdId);

if ($stmt->execute()) {
    echo "Success"; // or any other response you prefer
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
