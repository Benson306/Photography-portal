
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
                                
                                //form for editting 

    if (isset($_GET['edit_id']) ) { 
     
      ?>
        <div class="container">
      <div class="edit_form">
      <br>
      <br>
      <center>
      <div class="col-md-12">
          <div class="col-md-offset-4">
              <div class="col-md-5">
        <h4 class="well well-sm">Replace Preview Picture:</h4>
               </div>
            </div>
        </div>
         <?php 
                                $sql3 = "SELECT * FROM photographer_post WHERE email = '$email' LIMIT 4 ";
                                 $run3 = mysqli_query($link, $sql3);
                                $rows3= mysqli_fetch_assoc($run3);
                                $username=$rows['name'];
                                ?>
                                <div class="col-md-12">
                                  <div class="col-md-2">
                                    <?php 
                                    echo "<img src='images/$rows3[preview1]' class='img-rounded' width='150' height = '150' >";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<center>";
                                    echo "PREVIEW 1";
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
                                    echo "PREVIEW 2";
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
                                    echo "PREVIEW 3";
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
                                    echo "PREVIEW 4";
                                    echo "</center>";
                                    ?>
                                  </div>
                                </div>

                               <?php
                                    ?>
              <form method="post" enctype="multipart/form-data" >
              <div class="col-md-12">
                      <div class="col-md-offset-4">
                          <div class="col-md-5 form-group">
                              <label > Select name of  photo you want to replace:</label>
                                      <select class="form-control" name="select" required="yes" >
                                        <option></option>
                                        <option value="preview1">Preview 1</option>
                                        <option value="preview2">Preview 2</option>
                                        <option value="preview3">preview 3</option>
                                        <option value="preview4">preview 4</option>
                                      </select>
                          </div>
                      </div>
                   </div>
                  <div class="col-md-12">
                      <div class="col-md-offset-4">
                          <div class="col-md-5 form-group">
                              <label >Upload:</label>
                                      <input type="file" class="form-control" name="pic1" required="yes" >
                          </div>
                      </div>
                   </div>
                    <p>
                    <div class="col-md-12">
                        <div class="col-md-offset-4">
                            <div class="col-md-5 form-group">
                               <input type="hidden" value="<?php echo $_GET['edit_id'] ?>" name="edit_pic_id"></p>
                                 <input type="submit" Value="Save" class="btn btn-primary " name="edit_pic" >
                                    <a href="dashboard.php" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                        </div>
             
              </form>
              </center>
       </div>
       </div>

      <?php } ?>
      </body>
      </html>


      <?php 
if (isset($_POST['edit_pic'] ) ){
    $select = mysqli_real_escape_string($link,$_POST['select']);

    $target1="images/".basename($_FILES["pic1"]["name"]);
    $file1 =$_FILES["pic1"]["name"];

    $edit_id = $_POST['edit_pic_id']; //passes the post id

    move_uploaded_file($_FILES["pic1"]["tmp_name"], $target1);

  $edit_sql = "UPDATE photographer_post SET $select ='$file1' WHERE p_id ='$edit_id' ";

   if(mysqli_query($link,$edit_sql) ) { ?>
    <script>
    window.alert("You have succesfully Edited");
    window.location="dashboard.php";
    </script>
   <?php } else { ?>
   <script >
   window.alert("Server Error. Retry");
   window.location="edit_preview_photo.php";
   </script>
   <?php }
}

?>