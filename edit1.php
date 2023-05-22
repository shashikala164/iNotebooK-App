<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>

<?php
// Include the database connection file
require_once("config.php");

// Fetch data in descending order (lastest entry first) show in table
$result1 = mysqli_query($conn, "SELECT * FROM notes ORDER BY id DESC");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM notes WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$title = $resultData['title'];
$impNote = $resultData['impNote'];
$description = $resultData['description'];
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>iNotebooks - Make your knowledge towards digital moto!!!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">iNotebook</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>

<div class="container mt-4">

<h4 class="text-dark">Add your Notes here:</h4>

<form name="edit" method="post" action="editAction.php" class="mt-4">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Add Notes Title</label>
      <input type="text" class="form-control" value="<?php echo $title; ?>" name="title" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Add Important Note as you want</label>
      <input type="text"  value="<?php echo $impNote; ?>" name="impNote" class="form-control" id="inputPassword4" required>
    </div>
    <div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1" class="form-label">Add Notes Description</label>
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required><?php echo $description; ?></textarea>
    </div>

  <div class="form-group col-md-12">
  <input type="hidden" name="id" value=<?php echo $id; ?>>
  </div>
  <button type="submit" name="update" value="update" class="btn btn-success">Update Note</button>
  </div>
  <h4 class="my-4">You can view your notes here:</h4>
<table class="table table-bordered border-secondary mt-4">
  <thead>
    <tr>
      <th scope="col">SR.No</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Important Note as you wish</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr> -->
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result1)) {
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
                  echo "<td>".$res['title']."</td>";
                  echo "<td>".$res['impNote']."</td>";
                  echo "<td>".$res['description']."</td>";	
                  echo "<td><a type='button' class='btn btn-primary' disabled href=\"edit1.php?id=$res[id]\">Edit</a> 
                  <a type='button' class='btn btn-danger mt-1' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
  </tbody>
</table>
</form>



</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
