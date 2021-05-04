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
   $sql= "SELECT * FROM client_details WHERE email = '$email' ";
    $run = mysqli_query($link,$sql);
    $rows= mysqli_fetch_assoc($run);
    $fname=$rows['username'];
    $phone=$rows['phone_number'];
    $address=$rows['address'];
    $location=$rows['location'];

?>




<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
  <style>
  .panel-body#panel1{
      background-color: white;
      box-shadow:  #e6e6e6 5px 5px 5px;
    }
  </style>
  <meta charset="utf-8">
  <link rel="stylesheet" href="client_d.css">
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

<div class="row">
    <div class="leftbar">
                <div class="logo_img">
                  <img src="my_images/logo1.jpg" class="img"alt="logoimage loading" width='500' height ='300'>
                </div>
                <div class="title1">
                      <h2>Arts~in~a~flash</h2>
                </div>
                <div class="profile_sidebar">
                                  

                      			 

                        			<h4><?php echo htmlspecialchars($_SESSION["email"]); ?></h4>
                        			<a href="client_logout.php">  <button class="btn btn-danger"  type="button" name="button">sign out </button></a>

          <br>
          <br>
                </div>
                <div class="profile_sidebar">
                <center><h2><u>My Job post</u></h2></center>

                 <?php


  $sql8 = "SELECT * FROM posts WHERE email = '$email' ";
  $run = mysqli_query($link, $sql8);
  
  while($rows8 = mysqli_fetch_assoc($run)) {

    echo "
      <p>
      <div class='col-md-12' > 
        <div class='panel panel-success'  >
          <div class='panel-body'id='panel1'>
              <font size='2px'>
              <label>Job Name:</label>  $rows8[job_name]
              <br>
              <label>Photography Type:</label>  $rows8[p_type]
              <br>
              <label>Description:</label>  $rows8[description]
              <br>
              <label>Pricing:</label>  $rows8[pricing]
              <br>
              <label>Deadline:</label>  $rows8[deadline]
              <br>
              <label>Location:</label>  $rows8[location]
              <br>
              <td><a href='edit_post.php?edit_id=$rows8[id]' class='btn btn-primary'>Edit</button></a></td>
              <br>
              <br>
              <td><a href='client_dashboard.php?del_id=$rows8[id]' class='btn btn-danger'>Delete</button></a></td>

                </font>                    
          </div>
        </div>
      </div>
      <br>
      </p>
";

}

?>
                                    <br>
                                    <br>
                           </div>
    </div>
    <div class="centerbar">

                <div class="title">
                      <p><h2><u>Clients Control Panel</u></p>
                </div>
                <div class="maincontent">
                        <p><h3><u>Find a Photographer:</u></h3></p>   
                        <p><h4><u>Method 1:   </u></h4></p>
                        <p>Search  below for the photographer by filtering using photography type</p> 
                        <div class="col-md-12">
                          <div class="col-md-offset-2">
                            <div class="col-md-10">
                              <form method="post" action="filter_results.php">
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
                                      <label>Max Pricing:</label>
                                      <input type="text" class="form-control" placeholder="Max amount you are williing to pay" name="pricing" required="yes">
                                      <br>
                                      <input type="submit" class="btn btn-primary" value="Search" name="search">
                             </form>
                            </div>
                          </div>
                        </div> 
                        ......................
                        <p><h4><u>Method 2:   </u></h4></p>
                        <p>Post a job and let photographers bid on it:</p> 
                        <div class="col-md-12">
                          <div class="col-md-offset-2">
                            <div class="col-md-10">
                              <form method="post">
                              <label>Job Name:</label>
                                      <input type="text" class="form-control" placeholder="Name of Job" name="job_name" required="yes">
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
                                      <textarea class="form-control" name="description" required="yes" rows="3" placeholder="Give a brief description of how the job is to be done"></textarea>
                                      <br>
                                      <label>Pricing:</label>
                                      <input type="number" class="form-control" placeholder="Max amount you are williing to pay" name="pricing" required="yes">
                                      <br>
                                      <label>Deadline:</label>
                                      <input type="date" class="form-control" placeholder="Deadline" name="deadline" required="yes">
                                      <br>
                                      <label>Location of job:</label>
                                      <input type="text" class="form-control" placeholder="Location" name="location" required="yes">
                                      <br>
                                      <input type="submit" class="btn btn-success" value="Post Bid" name="post">
                             </form>
                            </div>
                          </div>
                        </div>
                        
                        
                             
                 </div>
                  
    </div>
                    <div class="rightbar">

                            <div class="account_info">
                          		<p><h2><u>My account</u></h2></p>

                                <?php
                               echo "<img src='images/$rows[image]' class='img-rounded' width='150' height = '150' >";
                               echo "<br>";
                               echo "<br>";
                                    $sql6= "SELECT * FROM client_details WHERE email = '$email' ";
                                    $run6 = mysqli_query($link,$sql6);
                                    $rows6= mysqli_fetch_assoc($run6);
                                    echo "<a href='edit_client_profile_photo.php?edit_id=$rows6[c_id]' class='btn btn-warning'>Replace Profile Photo</button></a>";
                               
                              ?>
                              <br>
                              <br>
                                 <table class="table table-striped" >
                                   <tr>
                                     <td>Username:</td>
                                     <td>
                                       <?php  echo $fname; ?>
                                     </td>
                                   </tr> 
                                    <tr>
                                     <td>Phone Number:</td>
                                     <td>
                                       <?php echo $phone; ?>
                                     </td>
                                   </tr>
                                   <tr>
                                     <td>Address:</td>
                                     <td>
                                       <?php echo $address; ?>
                                     </td>
                                   </tr><tr>
                                     <td>Location:</td>
                                     <td>
                                       <?php echo $location; ?>
                                     </td>
                                   </tr>
                                 </table>
                                    <?php 
                                    $sql4= "SELECT * FROM client_details WHERE email = '$email' ";
                                    $run4 = mysqli_query($link,$sql4);
                                    $rows4= mysqli_fetch_assoc($run4);
                                    echo "<a href='edit_client_account.php?edit_id=$rows4[c_id]' class='btn btn-primary'>Update account</button></a>";
                                    ?>
                                </form>
                                  <p><h3><u>View Bids on my job Post</u></h3></p>
                                <?php
                                    $sql11= "SELECT * FROM posts  WHERE email = '$email' ";
                                    $run11 = mysqli_query($link,$sql11);


                                    echo "
                                     <table class='table table-condensed' > 
                                     <thead>
                                     <th>Job Name</th>
                                     <th>job ID</th>
                                   </thead>

                                    ";
                                    while($rows11= mysqli_fetch_assoc($run11)){
                                       ?>
                                       <tr>
                                         <td><?php echo $rows11['job_name'] ?></td>
                                         <td><?php echo $rows11['id']  ?></td>
                                         <?php echo " <td><a href='bids.php?bid_id=$rows11[id]'' class='bg-info'>View Bids</a></td>" ; ?>
                                       </tr>
                                   
                                 


                                  <?php  } ?>
                                  </table>
                               <br>
                             

                            </div>
                      
                      </div>
</div>
</body>
</html>

<?php 
if(isset($_POST['post'])){
  $p_type=mysqli_real_escape_string($link,strip_tags($_POST['selection']));
  $location=mysqli_real_escape_string($link,strip_tags($_POST['location']));
  $description=mysqli_real_escape_string($link,strip_tags($_POST['description']));
  $pricing=mysqli_real_escape_string($link,strip_tags($_POST['pricing']));
  $deadline=mysqli_real_escape_string($link,strip_tags($_POST['deadline']));
  $job_name=mysqli_real_escape_string($link,strip_tags($_POST['job_name']));


  $sql7= "INSERT INTO posts (email, job_name, p_type, phone_number, description, pricing, deadline, location)VALUES('$email',  '$job_name', '$p_type', '$phone', '$description', '$pricing', '$deadline', '$location')";
  if(mysqli_query($link,$sql7)){
    ?>
<script>
  window.alert("You have succesfully posted the job");
  window.location="client_dashboard.php";
</script>
  <?php } else{ ?>
  <script>
  window.alert("Unable to post the job. Try again");
  window.location="client_dashboard.php";
</script>

 <?php }


}

?>
<!-- Deleting data from database-->
<?php 
if(isset($_GET['del_id'])){
  $del_sql = "DELETE FROM posts WHERE id = '$_GET[del_id]' ";
  if(mysqli_query($link, $del_sql)) { ?>
  <script>window.location="client_dashboard.php"</script>
  <?php }
}
?>
<!-- End of deleting data from Database -->

