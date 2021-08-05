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

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body {background-image: url('background.jpg');
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
<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
<div class="navbar">
<table style="width:100%;font-size: 25px;"> 
<tr style="color:white;">
<th><img src="logodark.PNG" style="width:190px;height:97px;"></th>
    <th><a href="index.php"><i class="fa fa-fw fa-home"></i>Home</a></th>
    <th><a href="Courses.php"><i class="fa fa-fw fa-book"></i>Courses</a></th>
	<th><a href="help.php"><i class="fa fa-fw fa-comment"></i>Comments</a></th>
	<th>
	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?></th>
  </tr>
</table>
</div>
<table><tr><th><img src="Q1.jpg" style="width:500px;height:400px;margin-top:150px;margin-left:25px;"></th>
<th style="background-color:white";><p style="color:black; font-family:Arial; font-size:18px;margin-left:15px;">
Education is the most important requirement for a person to grow, either formal,
Informal or non-formal education. That is why the Ministry of Education has come up
with a new curriculum which is Competency Based Curriculum (CBC) ( (Mutsinzi,
2017) ). The language used for teaching in the first three years of primary education is 
Kinyarwanda. In the fourth through sixth years, this becomes English.
French, the language of instruction before Paul Kagame's accession to power, 
was officially replaced in schools by English.[when?] However, French classes were 
reintroduced weekly in primary schools, since 2016.
My software will be helping in CBE implementation. This is because some of the
hindrances of the teachers in career is that they are not able to plan teacher’s
documents in the way that they are planned in CBE (James, 2009). 
Education is the passport to the future, for tomorrow belongs to those who prepare for it today. – Malcolm X


</p></th>
</tr></table>
<div style="background-color:rgb(0, 0, 0);width:100%;height:200px;margin-top:100px;">
<table>
<tr><th><img src="logoblack.PNG" style="width:190px;height:128px;float:left"></th>
<th><p style="color:white;font-size: 18px; margin-left:300px;">
<a href="index.php"><a class="active" href="#">Home</a><br><br>
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
      </div>
</body>
</html>
</html>