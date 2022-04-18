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
$stmt = $conn->prepare("INSERT INTO book (book_title, category_id, author, 
book_copies, book_pub, publisher_name, isbn, copyright, date_added, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisisssiss", $book_title, $category_id, $author, $book_copies, $book_pub, $publisher_name, $isbn, 
$copyright, $date_added, $status);
// set parameters and execute
$book_title = $_POST["title"];
$category_id = $_POST["category"];
$author = $_POST["author"];
$book_copies = $_POST["bookcopies"];
$book_pub = $_POST["bookpub"];
$publisher_name = $_POST["publishername"];
$isbn = $_POST["isbn"];
$copyright = $_POST["copyright"];
date_default_timezone_set('Asia/Kuala_Lumpur');
$date_added = date('Y-m-d H:i:s', time());
$status = $_POST["status"];
if(is_numeric($book_copies)){
$stmt->execute();
echo "New book added successfully";
}
else{
echo "Book copies should be integer";
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

</body>
</html>