<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: donor.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?>
    <body id="page-top">
        <div style="height:100vh; width:100%; background: #440000" >
        <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- Default form login -->
        <form class="text-center bg-light border border-light p-5" style="border-radius:20px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <p class="h4 mb-4">Sign in</p>

            <!-- Email -->
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="email" name="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <!-- Password -->
                <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <!-- Sign in button -->
            <div class="form-group">
                <button class="btn btn-danger btn-block my-4" type="submit">Sign in</button>
            </div>
            <!-- Register -->
            <p>Not a member?
                <a style="color: red;" href="register.php">Register</a>
            </p>

            
        </form>
<!-- Default form login -->
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
        </div>
    
        
</body>
</html>