<html>
<head>
<title>
displaybook
</title>
<style type="text/css">
table{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ddd;
  padding: 4px;
  text-align: center;
}

tr:nth-child(even){background-color: floralwhite;}

tr:hover {background-color: peachpuff;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: coral;
  color: white;
}
</style>
</head>
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
$sql = "SELECT * FROM `book`,category WHERE book.category_id=category.category_id ORDER BY book_id;
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th>Book ID</th><th>Book Title</th><th>Category</th><th>Author</th><th>Book Copies</th><th>Book Publisher</th><th>Publisher Name</th>
<th>ISBN</th><th>Copyright Year</th><th>Date added</th><th>Book status</th></tr>";
// output data of each row
while($row = $result->fetch_assoc()) {
 echo "<tr><td>".$row["book_id"]."</td><td>".$row["book_title"]."</td>
<td>".$row["classname"]."</td><td>".$row["author"]."</td><td>".$row["book_copies"]."</td><td>".$row["book_pub"]."</td><td>".$row["publisher_name"]."</td>
<td>".$row["isbn"]."</td><td>".$row["copyright"]."</td><td>".$row["date_added"]."</td><td>".$row["status"]."</td></tr>";
 }
echo "</table>";
} else {
echo "0 results";
}
$conn->close();
?>
</body>
</html>