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
$stmt = $conn->prepare("INSERT INTO borrow_details (member_id, borrow_date, due_date, book_id, 
borrow_status, return_date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $member_id, $borrow_date, $due_date, $book_id, 
$borrow_status, $return_date);

$sql="SELECT book_id FROM book WHERE book_title='" . $_GET["booktitle"] . "'";
$sqlquery = mysqli_query($conn,$sql);
$sqli="SELECT * FROM member WHERE member_id='" . $_GET["memberid"] . "'";
$sqliquery = mysqli_query($conn,$sqli);
if($sqlresult = mysqli_fetch_array($sqlquery)){
	if($sqliresult = mysqli_fetch_array($sqliquery)){
$book_id = $sqlresult['book_id'];
$query = "SELECT borrow_status FROM borrow_details WHERE (book_id='$book_id')";
$result = mysqli_query($conn,$query);
if($row = mysqli_fetch_array($result)){
    echo"The book is " . $row["borrow_status"] . "<br>";
    if($row["borrow_status"] = "Pending"){
    echo"Try to borrow another book.";
    }
}
else{
    $member_id = $_GET["memberid"];
	date_default_timezone_set('Asia/Kuala_Lumpur');
    $borrow_date = date('Y-m-d H:i:s', time());
	$timestamp=strtotime("+20 Days");
    $due_date =  date('Y-m-d H:i:s', $timestamp);
    $borrow_status = "Pending";
	$return_date;
    $stmt->execute();
    echo "Book borrowed successfully";
    }
}
else {
	echo"Member id '" . $_GET["memberid"] . "' does not exist in this library";
}
}
else {
	echo"The book '" . $_GET["booktitle"] . "' does not exist in this library";
}

$stmt->close();
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