<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("config.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$impNote = mysqli_real_escape_string($conn, $_POST['impNote']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
		
	// Check for empty fields
	if (empty($title) || empty($impNote) || empty($description)) {
		if (empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if (empty($impNote)) {
			echo "<font color='red'>Note field is empty.</font><br/>";
		}
		
		if (empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($conn, "INSERT INTO notes (`title`, `impNote`, `description`) VALUES ('$title', '$impNote', '$description')");
		
		// Display success message
		echo "<p><font color='green'>Notes added successfully!</p>";
		echo "<a href='welcome.php'>View Result</a>";
	}
}
?>
</body>
</html>
