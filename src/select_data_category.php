<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "myDB";

$servername= $_POST["servername"]; 
$username=$_POST["username"]; 
$password=$_POST["password"]; 
$dbname=$_POST["dbname"]; 
$category=$_POST["category"]; 
$value=$_POST["cvalue"]; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, email FROM MyGuests WHERE $category='$value'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"].    " - email: " . $row["email"].  "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>