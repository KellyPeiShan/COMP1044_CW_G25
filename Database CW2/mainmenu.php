<html>
    <head>
        <title>Library Home Page</title>
        <link rel = "stylesheet" type ="text/css" href="libhomepgstyle.css">
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
		$stmt = $conn->prepare("INSERT INTO users (username, password, firstname, lastname) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $username, $password, $firstname, $lastname);
		// set parameters and execute
		$username = $_POST["username"];
		$password = $_POST["password"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$stmt->execute();
		$stmt->close();
		$conn->close();
		?> 
			<center>
                <h1 class="title">The Library</h1>
                <h1 class="welcome">Welcome to our library today, you can perform functions related to the 3 categories: books, members and borrowing.</h1>
            </center>
            <div class="row">
                <div class="column">.
                    <div class = "loginbox">
                        <h2>Books</h2>
                        <a href="addbook.html" class="button">Add a book</a>
                        <br>
                        <a href="searchbook.html" class="button">Search for a book</a>
                        <br>
                        <a href="deletebook.html" class="button">Delete a book</a>
						<br>
						<a href="displaybook.php" class="button">Browse all book</a>
                    </div>
                </div>
                <div class="column">.
                    <div class = "loginbox">
                        <h2>Members</h2>
                        <a href="joinmember.html" class="button">Join as a member</a>
                        <br>
                        <a href="updatemember.html" class="button">Update member details</a>
                        <br>
                        <a href="searchmember.html" class="button">Search member</a>
						<br>
						<a href="deletemember.html" class="button">Cancel membership</a>
                    </div>
                </div>
                <div class="column">
                    <div class = "loginbox">
                        <h2>Borrowing</h2>
                        <a href="borrowbook.html" class="button">Borrrow a book</a>
                        <br>
                        <a href="updateborrow.html" class="button">Update borrow details</a>
                    </div>
                </div>
            </div>
        </body>
    </head>
</html>