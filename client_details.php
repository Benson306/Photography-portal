<html>
<head>
<?php
// Include config file
session_start();
require("config.php") ;
if($email=$_SESSION["email"]){
	?>
 <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="photo_style.css">
     <!-- bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- icons -->
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<!-- End of bootsrap -->
</head>
<?php 
                                $sql3 = "SELECT * FROM client_users WHERE email = '$email'";
                                 $run3 = mysqli_query($link, $sql3);
                                $rows3= mysqli_fetch_assoc($run3);
                                $username=$rows3['username'];
                                ?>
<body>
	<div class="wrapper">
	<center>
		<h2>First Time Login</h2>
		<h3>Fill out the Form Below To Conmplete Creating your account:</h3>
	<center>
		<form class="signup_form" method="post" enctype="multipart/form-data">
			<div class="form-group"> 
                <label>Profile Photo:</label>
                <input type="file" class="form-control" name="image" required="yes">
            </div>
			<div class="form-group">
				<label>Phone Number:</label>
				<input type="text" class="form-control" name="phone" required="yes">
			</div>
			<div class="form-group">
				<label>Address:</label>
				<input type="text" class="form-control" name="address" required="yes">
			</div>
			<div class="form-group">
				<label>Location:</label>
				<input type="text" class="form-control" name="location" required="yes">
			</div>
			<input type="submit" name="submit" class="btn btn-success" value="submit">
			<a href="client_logout.php" class="btn btn-danger" >Logout</a>
		</form>
	</div>
</body>
</html>

<?php 
}else{
?>
<script>
window.alert("You must login first to continue");
window.location="client_login.php"
</script>
<?php
}

?>

<?php 
if(isset($_POST['submit'])){

	$location=mysqli_real_escape_string($link,strip_tags($_POST['location']));
	$phone=mysqli_real_escape_string($link,strip_tags($_POST['phone']));
	$address=mysqli_real_escape_string($link,strip_tags($_POST['address']));
	
	$target="images/".basename($_FILES["image"]["name"]);
	$file =$_FILES["image"]["name"];
	;

	if(move_uploaded_file($_FILES["image"]["tmp_name"], $target)){

		$sql= "INSERT INTO client_details (email, username, phone_number, address, location, image)VALUES('$email', '$username', '$phone', '$address', '$location','$file')";
		mysqli_query($link, $sql) ;	
		?>
		<script>
		window.alert("You have Successfully Completed Signing Up.");
		window.location="client_dashboard.php";
		</script>
		<?php
	}else{
		?>
		<script>
		window.alert("Unsuccessful . Try again");
		window.location="client_login.php";
		</script>
		<?php 
	} 
	


	
}
?>