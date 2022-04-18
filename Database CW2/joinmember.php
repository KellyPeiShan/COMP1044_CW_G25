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
$stmt = $conn->prepare("INSERT INTO member (firstname, lastname, gender, 
address, contact, type_id, year_level, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiiss", $firstname, $lastname, $gender, $address, $contact, $type_id, $year_level, 
$status);
// set parameters and execute
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$gender = $_POST["Gender"];
$address = $_POST["address"];
$contact = $_POST["contact"];
$type_id = $_POST["type_id"];
$year_level = $_POST["YearLevel"];
$status = "Active";
$stmt->execute();
echo "New member added successfully<br>";
$query = "SELECT * FROM member WHERE ((firstname='" . $firstname . "') and (lastname='" . $lastname . "'))";
$result = mysqli_query($conn,$query);
if($row = mysqli_fetch_array($result)){
    echo "Your member id is " . $row["member_id"]. "<br>";
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