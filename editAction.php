<?php
// Include the database connection file
require_once("config.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$impNote = mysqli_real_escape_string($conn, $_POST['impNote']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);	
	
	// Check for empty fields
	if (empty($title) || empty($impNote) || empty($description)) {
		if (empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if (empty($impNote)) {
			echo "<font color='red'>AImpNotege field is empty.</font><br/>";
		}
		
		if (empty($description)) {
			echo "<font color='red'>Desc field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($conn, "UPDATE notes SET `title` = '$title', `impNote` = '$impNote', `description` = '$description' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Notes updated successfully!</p>";
		echo "<a href='welcome.php'>View Result</a>";
	}
}
