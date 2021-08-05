<?php 
  session_start(); 
include('server.php');

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
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
</head>
<body>
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
	<div class="header">
		<h2>Admin - create user</h2>
	</div>
	
	<form method="post" action="create_user.php">
  	<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user"> + Create user</button>
		</div>
			
	</form>
	
</body>
</html>