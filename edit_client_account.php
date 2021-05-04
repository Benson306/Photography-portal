<?php
// Initialize the session
session_start();
require "login/config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
   
}
   $email=$_SESSION["email"];
   $email1=$_SESSION["email"];
?>

<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="p_dash.css">
  <!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- icons -->
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<!-- End of bootsrap -->
  <title>Art in a flash</title>
  </head>

  <body>
  <?php 
  if (isset($_GET['edit_id']) ) { 
    $sql4= "SELECT * FROM client_details WHERE email = '$email' ";
    $run4 = mysqli_query($link,$sql4);
    while( $rows4= mysqli_fetch_assoc($run4) ) {

      $username = $rows4['username'];
      $phone_number = $rows4['phone_number'];
      $location = $rows4['location'];
      $address = $rows4['address'];
    }

      $sql5= "SELECT * FROM client_users WHERE email = '$email' ";
    $run5 = mysqli_query($link,$sql5);
    while( $rows5= mysqli_fetch_assoc($run4) ) {

      $email = $rows5['email'];
      $password = $rows5['password'];
    }

    ?>
    <div class="container">
    <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4 well well-sm">
      <h2><center>Edit Client Account Details</h2></center></h2>
            <form role="form" method="POST">
            <div class="form-group">
            <label>Username:</label>
              <input type ="text" class="form-control" name="username" required="yes"  value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
            <label>Email:</label>
              <input type ="email" class="form-control" name="email" required="yes"  value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
            <label>Phone Number:</label>
              <input type ="text" class="form-control"  name="phone_number" required="yes"  value="<?php echo $phone_number; ?>">
            </div>
            <div class="form-group">
            <label>Address:</label>
              <input type ="text" class="form-control" name="address" required="yes"  value="<?php echo $address; ?>">
            </div>
            <div class="form-group">
            <label>Location:</label>
              <input type ="text" class="form-control" name="location" required="yes"  value="<?php echo $location; ?>">
            </div>
            <center>
            <div class="form-group">
            <p class="info info-alert">Note that if you change the email, you will use the new email when logging in</p>
              <input type="hidden" value="<?php echo $_GET['edit_id'] ?>" name="edit_pid"></p>
              <input type="submit" Value="Save" class="btn btn-primary " name="edit_account" >
              <a href="client_dashboard.php" class="btn btn-danger">Cancel</a>
            </div>
            </center>
  </form>
    </div>

    <div class="col-md-4">
    </div>
  
  </div>
  </div>

    <?php }
?>
</body>
      </html>

<!-- Editing data in a database -->
<?php 
if (isset($_POST['edit_account'] ) ){

  $username = mysqli_real_escape_string($link,strip_tags($_POST['username']));
  $email = mysqli_real_escape_string($link,strip_tags($_POST['email']));
  $address = mysqli_real_escape_string($link,strip_tags($_POST['address']));
  $location = mysqli_real_escape_string($link,strip_tags($_POST['location']));
  $phone = mysqli_real_escape_string($link,strip_tags($_POST['phone_number']));

  $edit_id = $_POST['edit_pid']; 

  $edit_sql = "UPDATE client_details SET email = '$email', username= '$username', phone_number='$phone', address='$address', location='$location'  WHERE c_id ='$edit_id' ";
  $edit_sql2 = "UPDATE client_users SET email = '$email', username= '$username'  WHERE email ='$email1' ";

mysqli_query($link,$edit_sql2);

   if(mysqli_query($link,$edit_sql) ) { ?>
    <script>
    window.alert("You have succesfully Edited");
    window.location="client_logout.php";
    </script>
   <?php } else { ?>
   <script >
   window.alert("Server Error. Retry");
   window.location="client_dashboard.php";
   </script>
   <?php }
}

?>


