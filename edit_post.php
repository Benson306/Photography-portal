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


?>




<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="results.css">
  <!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- icons -->
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- End of bootsrap -->

<style>
  .panel-body#panel1{
      background-color: white;
      box-shadow:  #e6e6e6 5px 5px 5px;
      width:465px;
    }

</style>
  <title>Filter Results</title>
  <nav>
    <ul>
      
      
      <li style="float:right"><a href="client_logout.php">Logout</a></li>
      <li style="float:right"><a href="#">About</a></li>
      <li style="float:right"><a href="#">Contact</a></li>
      <li style="float:right"><a href="index.php">Home</a></li>
      </ul>
</nav>
<br>
<br>
<br>
<br>
  </head>
  


  <?php 
  if (isset($_GET['edit_id']) ) { 
    $sql4= "SELECT * FROM posts WHERE id = '$_GET[edit_id]' ";
    $run4 = mysqli_query($link,$sql4);
    while( $rows4= mysqli_fetch_assoc($run4) ) {
      $job_name = $rows4['job_name'];
      $description = $rows4['description'];
      $pricing = $rows4['pricing'];
      $deadline = $rows4['deadline'];
      $phone_number = $rows4['phone_number'];
      $location = $rows4['location'];
    }

    ?>
    <div class="container">
    <div class="row">
    <a href='client_dashboard.php' class='btn btn-danger'>Back</a>
    <br>
    <br>
    <div class="col-md-4">
    </div>
    <div class="col-md-4 well well-sm">
      <h2><center>Edit Post</h2></center></h2>
            <form role="form" method="POST">
            <label>Job Name:</label>
                  <input type="text" class="form-control" placeholder="Name of Job" name="job_name" required="yes" value="<?php echo $job_name; ?>">
              <br>
            <label>Select the photography type:</label>
                  <select class="form-control" name="selection" required="yes">
                        <option></option>
                        <option>Event Photography</option>
                        <option>Landscape Photography</option>
                        <option>Wildlife Photography</option>
                        <option>Sports Photography</option>
                        <option>Fashion Photography</option>
                </select>
            <br>
            <label>Job Description:</label>
            <textarea class="form-control" name="description" required="yes" rows="3" value="<?php echo $description; ?>"></textarea>
            <br>
            <div class="form-group">
            <label>Phone Number:</label>
              <input type ="text" class="form-control"  name="phone_number" required="yes"  value="<?php echo $phone_number; ?>">
            </div>
            <div class="form-group">
            <label>Deadline:</label>
              <input type ="date" class="form-control" name="deadline" required="yes"  value="<?php echo $deadline; ?>">
            </div>
            <div class="form-group">
            <label>Max amount you are williing to pay:</label>
              <input type ="number" class="form-control" name="pricing" required="yes"  value="<?php echo $pricing; ?>">
            </div>
            <div class="form-group">
            <label>Job Location:</label>
              <input type ="text" class="form-control" name="location" required="yes"  value="<?php echo $location; ?>">
            </div>
            <center>
            <div class="form-group">
              <input type="hidden" value="<?php echo $_GET['edit_id'] ?>" name="edit_pid"></p>
              <input type="submit" Value="Save" class="btn btn-primary " name="edit_post" >
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
  </head>
  </html>
<?php 
if (isset($_POST['edit_post'] ) ){

  $selection = mysqli_real_escape_string($link,strip_tags($_POST['selection']));
  $description = mysqli_real_escape_string($link,strip_tags($_POST['description']));
  $phone_number = mysqli_real_escape_string($link,strip_tags($_POST['phone_number']));
  $deadline = mysqli_real_escape_string($link,strip_tags($_POST['deadline']));
  $phone = mysqli_real_escape_string($link,strip_tags($_POST['phone_number']));
  $pricing = mysqli_real_escape_string($link,strip_tags($_POST['pricing']));
  $location = mysqli_real_escape_string($link,strip_tags($_POST['location']));
  $job_name = mysqli_real_escape_string($link,strip_tags($_POST['job_name']));



  $edit_id = $_POST['edit_pid']; 

  $edit_sql = "UPDATE posts SET job_name = '$job_name',p_type = '$selection', phone_number='$phone_number',description='$description', pricing='$pricing', deadline='$deadline',location='$location'  WHERE id ='$edit_id' ";


   if(mysqli_query($link,$edit_sql) ) { ?>
    <script>
    window.alert("You have succesfully Edited");
    window.location="client_dashboard.php";
    </script>
   <?php } else { ?>
   <script >
   window.alert("Server Error. Retry");
   window.location="client_dashboard.php";
   </script>
   <?php }
}

?>