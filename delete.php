<?php
// Include the database connection file
require_once("config.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($conn, "DELETE FROM notes WHERE id = $id");

// Redirect to the main display page (index.php in our case)
header("Location:welcome.php");

?>
