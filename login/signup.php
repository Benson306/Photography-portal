<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM photographer_users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "<div class='bg-danger'>This username is already taken.</div>";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "<div class='bg-danger'>Oops! Something went wrong. Please try again later.</div>";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    //validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM photographer_users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "<div class='bg-danger'>This username is already taken.</div>";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "<div class='bg-danger'>Oops! Something went wrong. Please try again later.</div>";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }




    if(empty(trim($_POST["email"]))){
        $email_err = "<div class='bg-danger'>Please enter an email.</div>";
    } else{ 

        $email = trim($_POST["email"]);
        $sql1 = "SELECT email FROM photographer_users WHERE email = '$email' ";
        $run1 = mysqli_query($link, $sql1); 

        $count= mysqli_num_rows($run1);
        if($count > 0 ){
            $email_err = "<div class='bg-danger'>The email exists.</div>";
        } else{
            $email = trim($_POST["email"]);
        }
        
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "<div class='bg-danger'>Please enter a password.</div>";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "<div class='bg-danger'>Password must have at least 6 characters.</div>";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "<div class='bg-danger'>Please confirm password.</div>";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "<div class='bg-danger'>Password did not match.</div>";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)){

        // Prepare an insert statement
        $sql3 = "INSERT INTO photographer_users (email, username, password) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql3)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_username, $param_password);

            // Set parameters
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                ?>
                <script>
                window.alert("You have succesfully created A Photographers' Account");
                 // Redirect to login page
                window.location="login.php";
                </script>
                <?php
                
            } else{
                ?>
                <script>
                window.alert("Something went wrong. Please try again later.");
                 // Redirect to login page
                window.location="signup.php";
                </script>
                <?php
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../photo_style.css">
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
<nav>
    <ul>
      
      
      <li style="float:right"><a href="#">Logout</a></li>
      <li style="float:right"><a href="#">About</a></li>
      <li style="float:right"><a href="#">Contact</a></li>
      <li style="float:right"><a href="../index.php">Home</a></li>
      </ul>
</nav>
<body>
    <div class="wrapper">
        <center>
        <h2>Photographers' Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        </center>
        <form class="signup_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required="yes" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required="yes" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group ">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required="yes" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group ">
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" required="yes" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">

            </div>
            <p>Already have an account? <a href="login.php"><b><u>Login here</u></b></a>.</p>
        </form>
    </div>
</body>
</html>
