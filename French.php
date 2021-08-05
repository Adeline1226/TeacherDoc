<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php
include_once 'dbconnect.php';

// fetch files
$sql = "SELECT * FROM courses where course='French'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
body {
background-color: lightblue;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
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
}

</style>
<title>TeacherDoc</title>
</head>
<body>
<div class="navbar">
<table style="width:100%;font-size: 25px;"> 
<tr style="color:white;">
<th><img src="logodark.PNG" style="width:190px;height:97px;"></th>
    <th class="me"><a href="index.php" ><i class="fa fa-fw fa-home"></i>Home</a></th>
    <th class="me"><a href="Courses.php"><i class="fa fa-fw fa-book"></i>Courses</a></th>
	<th class="me"><a href="help.php"><i class="fa fa-fw fa-comment"></i>Comments</a></th>
	<th><a href="index.php?logout='1'" style="color: red;">logout</a> </th>
	
  </tr>
</table>
</div>
<table style="margin-top:200px;font-family:Arial; font-size:18px;width:100%;">
<tr><th><h1>French Files from P1 to P6</h1></th></tr>
  <div class="row" >
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover" style="margin_top:30px; font_size:18px;">
                <thead>
                    <tr>
                        <th>#</th>
						<th>Class</th>
                        <th>Pedagogy Type</th>
                        <th>Course</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo $row['pedagogy_type']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['file_name']; ?></td>
                    <td><a href="UploadDoc/<?php echo $row['file_name']; ?>" target="_blank">View</a></td>
                    <td><a href="UploadDoc/<?php echo $row['file_name']; ?>" download>Download</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</table>
<div style="background-color:rgb(0, 0, 0);width:100%;height:200px;margin-top:100px;">
<table>
<tr><th><img src="logoblack.PNG" style="width:190px;height:128px;float:left"></th>
<th class="me"><p style="color:white;font-size: 18px; margin-left:300px;">
<a href="index.php">Home</a><br><br>
<a href="Courses.php">Courses</a> <br><br>
<a href="help.php">Comments</a> </p></th>
<th><p style="color:white;font-size: 18px;float:right; margin-left:300px;">
Case study : Rwanda <br>
Developer : Adeline Umutoni <br>
Developed in 2021 <br>  
Aiming at Improving teaching/Learning process <br>
vision: Improving Quality Education in Rwanda.<br>
mission: Making teaching process easy through using this website.
</p></th></tr>
</table>
</div>
</body>
</html>
</html>