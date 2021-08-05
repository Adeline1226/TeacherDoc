<?php session_start();  
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
// initializing variables
$course = "";
$class = "";
$file_name = "";
$pedagogy_type = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root','','TeacherDocDB');

// Give Comments
if (isset($_POST['addProduct'])) {
  // receive all input values from the form
  $course = mysqli_real_escape_string($db, $_POST['course']);
  $class = mysqli_real_escape_string($db, $_POST['class']);
  $file_name = mysqli_real_escape_string($db, basename($_FILES["photo"]["name"]));
  $pedagogy_type = mysqli_real_escape_string($db, $_POST['pedagogy_type']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($course)) { array_push($errors, "Course is required"); }
  if (empty($class)) { array_push($errors, "Class is required"); }
  if (empty($file_name)) { array_push($errors, "File_name is required"); }
  if (empty($pedagogy_type)) { array_push($errors, " Pedagogy is required");} 

// Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO courses (course, class, file_name, pedagogy_type) 
  			  VALUES('$course', '$class', '$file_name', '$pedagogy_type')";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "The file was successfully uploaded";
  	header('location: form.php');
  }
}
  //////////////////////////////////////////add product///////////////////////////////////////////////

  if (isset($_POST['addProduct'])  ) {


      @$target_dir = "./UploadDoc/";
	$uploadOk = 1;
      $file = basename($_FILES["photo"]["name"]);
      @$target_file = $target_dir . basename($_FILES["photo"]["name"]);
      @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
	  // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "docx" && $imageFileType != "pdf" && $imageFileType != "ppt"
&& $imageFileType != "xlsx" && $imageFileType != "odp") {
    echo "Sorry, only xlsx, pdf, odp, docx & ppt files are allowed.";
    $uploadOk = 0;
}
$file_name=basename( $_FILES["photo"]["name"]);
          //move file to the server
  if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)){
	       echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";  
  }
  else{
	          echo "Sorry, there was an error uploading your file.";
  }
}

 ?>



<head>
  <title>Upload Files</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
		.header {
		background: #003366;
	}
	button[name=reg_user] {
		background: #003366;
	}
	th {
  margin-left}
th {
  padding: 5px;
  text-align: left;
}
a {
color:white;
text-decoration: none;

}
.navbar{
overflow: hidden;
  background-color: rgb(7, 0, 31);
  position: fixed;
  top: 0;
  width: 100%;
	</style>
	<div class="navbar">
<table style="width:100%;font-size: 25px;"> 
<tr style="color:white;">
    <th><a href="form.php"><i class="fa fa-fw fa-book"></i>AddFile</a></th>
	<th><a href="admin.php"><i class="fa fa-fw fa-comment"></i>UserComments</a></th>
	<th><a href="create_user.php"><i class="fa fa-fw fa-plus"></i>CreateUser</a></th>
	<th><a href="home.php?logout='1'" style="color: red";>Logout</a></th>
  </tr>
</table>
</div>

<div class="container mt-3">
                     <h2>Add a file</h2>
  <form method="post" action="form.php" enctype="multipart/form-data">
    <strong> Select Course You want to upload:</strong>
	<select name="course" class="custom-select mb-3">
      <option selected></option>
      <option value="Social Studies">Social Studies</option>
      <option value="ELementary Science and Teachnology">SET</option>
      <option value="English">English</option>
	  <option value="Kinyarwanda">Kinyarwanda</option>
      <option value="French">French</option>
      <option value="Mathematics">Mathematics</option>
    </select>
	    <strong> Select Class:</strong>
	<select name="class" class="custom-select mb-3">
      <option selected></option>
      <option value="P1">P1</option>
      <option value="P2">P2</option>
	  <option value="P3">P3</option>
      <option value="P4">P4</option>
	  <option value="P5">P5</option>
      <option value="P6">P6</option>
    </select>
		    <strong> Select the Pedagogy type you want to upload:</strong>
	<select name="pedagogy_type" class="custom-select mb-3">
      <option selected></option>
      <option value="Scheme of Work">Scheme of Work</option>
      <option value="Lesson Plan">Lesson Plan</option>
    </select>
			    <strong>  Upload The File:</strong>
	<div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="photo" required>
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
  <div class="col-md-12 form-group">
          <button type="submit" id="btnAdd" name="addProduct" class="btn btn-primary pull-left" href="form.php">
            &#10004; Upload Now
          </button>
   </div>
  </form>
  <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</div>


		