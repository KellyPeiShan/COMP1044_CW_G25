<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// prepare and bind
$id = $_GET['id'];
$id = mysqli_real_escape_string($conn,$id);
$query = "SELECT * FROM member WHERE member_id='" . $id . "'";
$result = mysqli_query($conn,$query);

if($row = mysqli_fetch_array($result)) {
    echo "member id: " . $row["member_id"]. "<br>";
    echo"firstname: " . $row["firstname"]. "<br>";
    echo"lastname: " . $row["lastname"]. "<br>";
    echo"gender: " . $row["gender"]. "<br>" ;
    echo"address: " . $row["address"]. "<br>" ;
    echo"contact: " . $row["contact"]. "<br>"; 
    echo"type_id: " . $row["type_id"]. "<br>" ;
    echo"year_level: " . $row["year_level"]. "<br>" ;
    echo"status: " . $row["status"]. "<br>";
}
else{
  echo"Member id '$id' does not exist in this library";
}  

$conn->close();
?> 

<button id="myButton" class="float-left submit-button" >Home</button>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "mainmenu.html";
    };
</script>

<body\>
<html\>