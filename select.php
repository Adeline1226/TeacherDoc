

		
		<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacherdocdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["fname"]. " " . $row["lname"]." - who teaches " . $row["course"]."  At " . $row["school"]." - Commented: " . $row["comment"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>


			
	
	</div>
</body>
</html>