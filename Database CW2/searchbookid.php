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
$query = "SELECT * FROM book WHERE book_id='" . $id . "'";
$result = mysqli_query($conn,$query);

if($row = mysqli_fetch_array($result)){
    echo "book id: " . $row["book_id"]. "<br>";
    echo"title: " . $row["book_title"]. "<br>";
    echo"category id: " . $row["category_id"]. "<br>";
    echo"author: " . $row["author"]. "<br>" ;
    echo"book copies: " . $row["book_copies"]. "<br>" ;
    echo"book pub: " . $row["book_pub"]. "<br>"; 
    echo"publisher: " . $row["publisher_name"]. "<br>" ;
    echo"isbn: " . $row["isbn"]. "<br>" ;
    echo"copyright: " . $row["copyright"]. "<br>"; 
    echo"date added: " . $row["date_added"]. "<br>" ;
    echo"status: " . $row["status"]. "<br>";
}
else{
	echo"Book id '$id' does not exist in this library";
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