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
// sql to delete a record
$sql = "DELETE FROM borrow_details WHERE member_id='"    .   $_GET["id"]  .   "'";
$sqli = "DELETE FROM member WHERE member_id='"    .   $_GET["id"]  .   "'";
$id = $_GET['id'];
$id = mysqli_real_escape_string($conn,$id);
$query = "SELECT * FROM member WHERE member_id='" . $id . "'";
$result = mysqli_query($conn,$query);

if($row = mysqli_fetch_array($result)) {
if ($conn->query($sql) === TRUE && $conn->query($sqli) === TRUE ) {
echo "Member deleted successfully";
} else {
echo "Error deleting record: " . $conn->error;
}
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
</body>
</html>