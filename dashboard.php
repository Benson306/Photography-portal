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
   $sql= "SELECT * FROM photographer_details WHERE email = '$email' ";
    $run = mysqli_query($link,$sql);
    $rows= mysqli_fetch_assoc($run);
    $fname=$rows['name'];
    $p_type=$rows['p_type'];
    $phone=$rows['phone_number'];
    $address=$rows['address'];
    $location=$rows['location'];

    $sql2= "SELECT * FROM photographer_users WHERE email = '$email' ";
    $run1 = mysqli_query($link,$sql2);
    $rows1= mysqli_fetch_assoc($run1);
    $date=$rows1['created_at'];
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
                        			<a href="login/logout.php">  <button class="btn btn-danger"  type="button" name="button">sign out </button></a>

          <br>
          <br>
                </div>
    </div>
    <div class="centerbar">

                <div class="title">
                      <p><h2><u>Photographers' Control Panel</u></p>
                </div>
                <div class="maincontent">
                              
                              
                              <h2>Your Previewed Works:</h2>
                              <center>
                              <h4>Insert 4 of your best pictures:</h4>
                              <h5>This will be displayed when clients search for photographers.</h5>
                              </center>
                              <form method="post" enctype="multipart/form-data">
                              <div class="col-md-12">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Image 1:</label>
                                    <input type="file" class="form-control" name="pic1" required="yes" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Image 2:</label>
                                    <input type="file" class="form-control" name="pic2" required="yes">
                                  </div>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Image 3:</label>
                                    <input type="file" class="form-control" name="pic3" required="yes">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Image 4:</label>
                                    <input type="file" class="form-control" name="pic4" required="yes">
                                  </div>
                                </div>
                              </div>
                              <input type="submit" value="Upload" class="btn btn-primary" name="upload">
                              </form>
                                <br>
                                <div class="title">
                                 Pictures you have set for preview
                                </div>
                                <br>
                                <?php 
                                $sql3 = "SELECT * FROM photographer_post WHERE email = '$email' LIMIT 4 ";
                                 $run3 = mysqli_query($link, $sql3);
                                $rows3= mysqli_fetch_assoc($run3);
                                ?>
                                <div class="col-md-12">
                                  <div class="col-md-2">
                                    <?php 
                                    echo "<img src='images/$rows3[preview1]' class='img-rounded' width='150' height = '150' >";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<center>";
                                    echo "<a href='edit_preview_photo.php?edit_id=$rows3[p_id]' class='btn btn-primary'>Replace</button></a>";
                                    echo "</center>";
                                      ?>
                                  </div>
                                  <div class="col-md-1">
                                    
                                  </div>
                                  <div class="col-md-2">
                                    <?php 
                                    echo "<img src='images/$rows3[preview2]' class='img-rounded' width='150' height = '150' >";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<center>";
                                    echo "<a href='edit_preview_photo.php?edit_id=$rows3[p_id]' class='btn btn-primary'>Replace</button></a>";
                                    echo "</center>";
                                    ?>
                                  </div>
                                  <div class="col-md-1">
                                    
                                  </div>
                                  <div class="col-md-2">
                                    <?php 
                                    echo "<img src='images/$rows3[preview3]' class='img-rounded' width='150' height = '150' >";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<center>";
                                    echo "<a href='edit_preview_photo.php?edit_id=$rows3[p_id]' class='btn btn-primary'>Replace</button></a>";
                                    echo "</center>";
                                    ?>
                                  </div>
                                  <div class="col-md-1">
                                    
                                  </div>
                                  <div class="col-md-2">
                                    <?php 
                                    echo "<img src='images/$rows3[preview4]' class='img-rounded' width='150' height = '150' >";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<center>";
                                    echo "<a href='edit_preview_photo.php?edit_id=$rows3[p_id]' class='btn btn-primary'>Replace</button></a>";
                                    echo "</center>";
                                    ?>
                                  </div>
                                </div>

                               <?php
                                    ?>
                 </div>
                
    </div>
                    <div class="rightbar">

                            <div class="account_info">
                          		<p><h2><u>My account</u></h2></p>
                                <form class="" action="" method="post">
                                <?php
                               echo "<img src='images/$rows[image]' class='img-rounded' width='150' height = '150' >";
                               echo "<br>";
                               echo "<br>";
                                    $sql6= "SELECT * FROM photographer_details WHERE email = '$email' ";
                                    $run6 = mysqli_query($link,$sql6);
                                    $rows6= mysqli_fetch_assoc($run6);
                                    echo "<a href='edit_profile_photo.php?edit_id=$rows6[id]' class='btn btn-warning'>Replace Profile Photo</button></a>";
                               
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
                                     <td>Photographer Type:</td>
                                     <td>
                                       <?php echo $p_type; ?>
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
                                    $sql4= "SELECT * FROM photographer_details WHERE email = '$email' ";
                                    $run4 = mysqli_query($link,$sql4);
                                    $rows4= mysqli_fetch_assoc($run4);
                                    echo "<a href='edit_account_details.php?edit_id=$rows4[id]' class='btn btn-primary'>Update account</button></a>";
                                    ?>
                                </form>
                                  <p><h2><u>Recent Job Posts</u></h2></p>
                                  <?php


  $sql8 = "SELECT * FROM posts WHERE p_type = '$p_type' ";
  $run = mysqli_query($link, $sql8);
  
  while($rows8 = mysqli_fetch_assoc($run)) {

    echo "
      <p>
      <div class='col-md-12' > 
        <div class='panel panel-success'  >
          <div class='panel-body'id='panel1'>
              <font size='2px'>
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
              <td><a href='dashboard.php?bid_id=$rows8[id]' class='btn btn-success'>Bid</button></a></td>

                </font>                    
          </div>
        </div>
      </div>
      <br>
      </p>
";

}

?>
<?php 
if(isset($_GET['bid_id'])){
  $bid_id = $_GET['bid_id'];
  $sql9= "INSERT INTO bids (post_id, email) VALUES ('$bid_id', '$email')";

$sql7 = "SELECT * FROM bids WHERE email = '$email' &&  post_id = '$bid_id' ";
 $run7 = mysqli_query($link, $sql7);

  $count7 = mysqli_num_rows($run7);

  if($count7 > 0 ){?>
    <script>
    window.alert("Already bidded on this job");
    window.location="dashboard.php";
    </script>
  <?php

  } else  if(mysqli_query($link,$sql9)){
    ?>
    <script>
    window.alert("You have bidded succesfully");
    window.location="dashboard.php";
    </script>
  <?php }else{
    ?>
    <script>
    window.alert("Operation was unsuccesful. Try again");
    window.location="dashboard.php";
    </script>
  <?php


  }

}


?>
                                    <br>
                                    <br>




                            </div>
                      
                      </div>
</div>
</body>
</html>
<?php
if(isset($_POST['upload'])){
$target1="images/".basename($_FILES["pic1"]["name"]);
$file1 =$_FILES["pic1"]["name"];


$target2="images/".basename($_FILES["pic2"]["name"]);
$file2 =$_FILES["pic2"]["name"];


$target3="images/".basename($_FILES["pic3"]["name"]);
$file3 =$_FILES["pic3"]["name"];


$target4="images/".basename($_FILES["pic4"]["name"]);
$file4 =$_FILES["pic4"]["name"];


move_uploaded_file($_FILES["pic1"]["tmp_name"], $target1);
move_uploaded_file($_FILES["pic2"]["tmp_name"], $target2);
move_uploaded_file($_FILES["pic3"]["tmp_name"], $target3);
move_uploaded_file($_FILES["pic4"]["tmp_name"], $target4);

$sql = "INSERT INTO photographer_post (email, preview1, preview2, preview3, preview4) VALUES('$email', '$file1', '$file2' , '$file3', '$file4')";

 if(mysqli_query($link, $sql)){
    ?>
<script>
window.alert("Succesfully Uploaded");
window.location="dashboard.php";
</script>
    <?php
 }else{
  ?>
<script>
window.alert("Unsuccesful. Try Again");
window.location="dashboard.php";
</script>
    <?php
 }


}



?>
