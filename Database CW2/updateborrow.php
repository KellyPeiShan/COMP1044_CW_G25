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
//set parameter
$set=0;
$id=$_POST["borrowid"];
$duedate = $_POST["duedate"];
$borrowstatus = $_POST["borrow_status"];
$datereturned = $_POST["date_returned"];
//check if borrow id exist
$id = mysqli_real_escape_string($conn,$id);
$query = "SELECT * FROM borrow_details WHERE borrow_id='" . $id . "'";
$result = mysqli_query($conn,$query);

if($row = mysqli_fetch_array($result)) {
if($duedate!=""){
$sql = "UPDATE borrow_details SET due_date='$duedate' WHERE borrow_id='$id'";
if ($conn->query($sql) === TRUE ) {
$set=1;
}
}
if($borrowstatus!=""){
$sql = "UPDATE borrow_details SET borrow_status='$borrowstatus' WHERE borrow_id='$id'";
if ($conn->query($sql) === TRUE ) {
$set=1;
}
}
if($datereturned!=""){
$sql = "UPDATE borrow_details SET return_date='$datereturned' WHERE borrow_id='$id'";
if ($conn->query($sql) === TRUE ) {
$set=1;
}
}
if ($set==1) {
echo "Borrow details updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
}
else{
	echo"Borrow id '$id' does not exist in this library";
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