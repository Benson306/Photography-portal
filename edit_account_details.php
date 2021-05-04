<?php
// Initialize the session
session_start();
require "login/config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/login.php");
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
    $sql4= "SELECT * FROM photographer_details WHERE email = '$email' ";
    $run4 = mysqli_query($link,$sql4);
    while( $rows4= mysqli_fetch_assoc($run4) ) {

      $username = $rows4['name'];
      $p_type = $rows4['p_type'];
      $phone_number = $rows4['phone_number'];
      $location = $rows4['location'];
      $address = $rows4['address'];
      $max_price=$rows4['max_price'];
    }

      $sql5= "SELECT * FROM photographer_users WHERE email = '$email' ";
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
      <h2><center>Edit Account Details</h2></center></h2>
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
               <label>Photographer Type:</label> 
                  <select class="form-control" name="p_type" required="yes">
                  <option></option>
                  <option>Event Photography</option>
                  <option>Landscape Photography</option>
                  <option>Wildlife Photography</option>
                  <option>Sports Photography</option>
                  <option>Fashion Photography</option>
                  </select>
            </div>
            <div class="form-group">
            <label>Maximum Price per day per job:</label>
              <input type ="text" class="form-control"  name="price" required="yes"  value="<?php echo $max_price; ?>">
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
              <a href="dashboard.php" class="btn btn-danger">Cancel</a>
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
  $p_type = mysqli_real_escape_string($link,strip_tags($_POST['p_type']));
  $price=mysqli_real_escape_string($link,strip_tags($_POST['price']));
  $email = mysqli_real_escape_string($link,strip_tags($_POST['email']));
  $address = mysqli_real_escape_string($link,strip_tags($_POST['address']));
  $location = mysqli_real_escape_string($link,strip_tags($_POST['location']));
  $phone = mysqli_real_escape_string($link,strip_tags($_POST['phone_number']));

  $edit_id = $_POST['edit_pid']; 

  $edit_sql = "UPDATE photographer_details SET email = '$email', name= '$username', p_type= '$p_type', max_price='$price', phone_number='$phone', address='$address', location='$location'  WHERE id ='$edit_id' ";
  $edit_sql2 = "UPDATE photographer_users SET email = '$email', username= '$username'  WHERE email ='$email1' ";
   $edit_sql3 = "UPDATE photographer_post SET email = '$email' WHERE email ='$email1' ";
mysqli_query($link,$edit_sql2);
mysqli_query($link,$edit_sql3);
   if(mysqli_query($link,$edit_sql) ) { ?>
    <script>
    window.alert("You have succesfully Edited");
    window.location="login/logout.php";
    </script>
   <?php } else { ?>
   <script >
   window.alert("Server Error. Retry");
   window.location="dashboard.php";
   </script>
   <?php }
}

?>


