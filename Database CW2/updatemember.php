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
$id=$_POST["id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$gender = $_POST["Gender"];
$address = $_POST["address"];
$contact = $_POST["contact"];
$type_id = $_POST["type_id"];
$year_level = $_POST["YearLevel"];
$status = $_POST["status"];
//check if member exist
$id = mysqli_real_escape_string($conn,$id);
$query = "SELECT * FROM member WHERE member_id='" . $id . "'";
$result = mysqli_query($conn,$query);

if($row = mysqli_fetch_array($result)) {
if($firstname!=""){
$sql = "UPDATE member SET firstname='$firstname' WHERE member_id='$id'";
if ($conn->query($sql) === TRUE ) {
$set=1;
}
}
if($lastname!=""){
$sqli = "UPDATE member SET lastname='$lastname' WHERE member_id='$id'";
if ($conn->query($sqli) === TRUE ) {
$set=1;
}
}
if($gender!=""){
$sqlii = "UPDATE member SET gender='$gender' WHERE member_id='$id'";
if ($conn->query($sqlii) === TRUE ) {
$set=1;
}
}
if($address!=""){
$sqliii = "UPDATE member SET address='$address' WHERE member_id='$id'";
if ($conn->query($sqliii) === TRUE ) {
$set=1;
}
}
if($contact!=""){
$sqliiii = "UPDATE member SET contact='$contact' WHERE member_id='$id'";
if ($conn->query($sqliiii) === TRUE ) {
$set=1;
}
}
if($type_id!=""){
$sqliiiii = "UPDATE member SET type_id='$type_id' WHERE member_id='$id'";
if ($conn->query($sqliiiii) === TRUE ) {
$set=1;
}
}
if($year_level!=""){
$sqliiiiii = "UPDATE member SET year_level='$year_level' WHERE member_id='$id'";
if ($conn->query($sqliiiiii) === TRUE ) {
$set=1;
}
}
if($status!=""){
$sqliiiiiii = "UPDATE member SET status='$status' WHERE member_id='$id'";
if ($conn->query($sqliiiiiii) === TRUE ) {
$set=1;
}
}
if ($set==1) {
echo "Member record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
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