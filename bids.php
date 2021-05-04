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
  <body class="container">
  <?php
if(isset($_GET['bid_id'])) {
  $bid_id= $_GET['bid_id'];

  $sql = "SELECT * FROM bids WHERE  post_id= '$bid_id' ";
  $run = mysqli_query($link, $sql);

  $count = mysqli_num_rows($run);

  if($count > 0 ){
  $result=1;
  echo "
  <a href='client_dashboard.php' class='btn btn-danger'>Back</a>
  <br>
  <center><p><u><h3>List of Bidders on the Job:</h3></u></p></center>
  
  <br>
  <div class='col-md-offset-4'>
    <div class='col-md-7'>
  <table class='table table-condensed'>
    <thead>
    <tr>
      <th>Email of Bidder</th>
      
   </tr>

   </thead>
  ";
   while($rows= mysqli_fetch_assoc($run)){

   echo "
   <tr>
      <td>$rows[email]</td>
      <td><a href='bids.php?show_id=$rows[email]' class='btn btn-primary'>View Profile</button></a></td>
   </tr>
   

   ";
      
  $result++;
   }
   echo "</table>"; 
}else{
  echo "<center><h4>No results</h4></center>";
  echo "<center><a href='client_dashboard.php' class='btn btn-danger'>Back</a></center>";
}


}
?>

  <?php
  if(isset($_GET['show_id'])){

  $sql1 = "SELECT * FROM photographer_details WHERE email = '$_GET[show_id]' ";
  $run = mysqli_query($link, $sql1);
  $rows2= mysqli_fetch_assoc($run);

  $sql7 = "SELECT * FROM photographer_post WHERE email = '$_GET[show_id]' ";
  $run = mysqli_query($link, $sql7);
  $rows7= mysqli_fetch_assoc($run);
  

    echo "
    <a href='client_dashboard.php' class='btn btn-danger'>Back</a>
      <p>
      <div class='col-md-offset-3' > 
      <div class='col-md-7' > 
        <div class='panel panel-success'  >
          <div class='panel-body'id='panel1'>
              <img src='images/$rows2[image]' class='img-rounded' width='150' height = '150' >
              <br>
              <br>
              <font size='2px'>
              <label>Username:</label>  $rows2[name]
              <br>
              <label>Email:</label>  $rows2[email]
              <br>
              <label>Photography Type:</label>  $rows2[p_type]
              <br>
              <label>Phone Number:</label>  $rows2[phone_number]
              <br>
              <label>Address:</label>  $rows2[address]
              <br>
              <label>Location:</label>  $rows2[location]
              <br>
              <label>Maximum Price per day per Job:</label>  $rows2[max_price]
              <br>
              
              <br>
               
                </font>                    
          </div>
        </div>
      </div>
      </div>
      </p>

      <div class='col-md-12'>
      <div class='col-md-offset-2'>
      <h3><u>Photographers' previous Works:</u></h3>
      <br>
                                  <div class='col-md-2'>
                                    <img src='images/$rows7[preview1]' class='img-rounded' width='150' height = '150' >
                                  </div>
                                  <div class='col-md-2'>
                                  <img src='images/$rows7[preview2]' class='img-rounded' width='150' height = '150' >
                                  </div>
                                  <div class='col-md-2'>
                                  <img src='images/$rows7[preview3]' class='img-rounded' width='150' height = '150' >
                                  </div>
                                  <div class='col-md-2'>
                                  <img src='images/$rows7[preview4]' class='img-rounded' width='150' height = '150' >
                                  </div>
                   </div>
                   </div>
                   <br>
                   <br>
";


            }

?>