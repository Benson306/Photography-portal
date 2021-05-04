<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <?php
    date_default_timezone_set('Africa/Nairobi') ; 
    $date=(date("Y-m-d H:i:s"));

    ?>
    <?php
    if (isset($_POST['submitComment'])) {
    $conn=mysqli_connect("localhost","root","","school_project");
   
    $comment=$_POST['comment'];
    $comments_length=strlen($comment);
    if (  $comments_length>100) {
    echo "Bid too long !";
    }else {
    $comment=$_POST['comment'];
    $sql="INSERT INTO comments(message,date) VALUES('$comment', '$date')";
    $return=mysqli_query($conn,$sql);
    }
    }
     ?>
     <?php

    $conn=mysqli_connect("localhost","root","","school_project");
    $sql1="SELECT * FROM `comments` WHERE 1";
    $return1=mysqli_query($conn,$sql1);
    if (mysqli_num_rows($return1) > 0) {
      while ($row=mysqli_fetch_assoc($return1)) {
     echo"<div class='bid_box'>";

     echo $row['date'].'<br>';
     echo nl2br($row['message'] ).'<br>';
     echo"
     <form class='' method='post' enctype='multipart/form-data'>
     <input type='hidden' name='message' value='".$row['message']."' >
     <button class='btn1' type='submit' name='commentDelete'>delete</button>
     </div>";
      }
    }else {
      echo "no bids yet!";
    }?>
    <?php
     if (isset($_POST['commentDelete'])) {
     $conn=mysqli_connect("localhost","root","","school_project");
     $sql="DELETE  FROM comments;";
     $return=mysqli_query($conn,$sql);
      header('location:comment.php'); 
 	   }

     mysqli_close($conn);

      ?>
     <form class="comments"  method="POST" enctype="multipart/form-data">
     <h2>Bid for the job post here</h2>
     <textarea name="comment" rows="2 " cols="40" placeholder="what makes you feel you are the right candidate for the job?"></textarea><br>
     <input type="submit" name="submitComment" value="place your bid">
     <input type="hidden" name="date" value=".date(Y-m-d H:i:s).">
     </form>
  </body>
</html>
</form>
