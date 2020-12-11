<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["signin"]) || $_SESSION["signin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?>
<body>
    <?php
        session_start();
    ?>
    <!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #440000" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><span><img src="assets/img/navbar-logo.svg" style="height: 7vh;" alt="" /></span></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto text-center">
                        <li class="nav-item pl-2 mb-2 mb-md-0">
                            <a href="index.php" type="button" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='#ffa900'"
                              class="btn btn-outline-warning btn-md btn-rounded btn-navbar waves-effect waves-light">Home</a>
                        </li>
                        <li class="nav-item pl-2 mb-2 mb-md-0">
                            <a href="logout.php" type="button" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='#f93154'"
                              class="btn btn-outline-danger btn-md btn-rounded btn-navbar waves-effect waves-light">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
    <?php
    if(isset($_GET['content_id'])) {
        $content=$_GET['content_id'];
    }
    ?>
    <?php

        $conn = mysqli_connect("localhost", "root", "", "blood");
        if(!$conn){
            print "Error";
        }
    ?>
    <section class="container p-5">
    <section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-auto">Donor Details</h2>
        
            
        <div class="row mt-5">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">Email</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->   
                    <!--Grid column-->
                    <div class="row">
                        <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="mobile" name="mobile" class="form-control">
                                    <label for="mobile" class="">Mobile Number</label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <select type="text" id="bloodgroup" name="bloodgroup" class="form-control dropdown">
                                    <option>-Choose blood group-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                </select>
                                <label for="bloodgroup" class="">Blood Group</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="message" name="messages" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Add Descriptions</label>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <input type="hidden" name="username" value="<?php echo $_SESSION["username"]; ?>">
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                </form>

                <div class="text-center text-md-left">
                    <button id="send" class="btn btn-warning" onclick="document.getElementById('contact-form').submit();">Send</button>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>MESCE, Kuttippuram, Malappuram</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 91 XXX XXX 89</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>contact@donateblood.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>

    </section>
</section>
<?php include('includes/footer.php'); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['name']);
    $mobile = htmlspecialchars($_REQUEST['mobile']);
    $email = htmlspecialchars($_REQUEST['email']);
    $bloodgroup = htmlspecialchars($_REQUEST['bloodgroup']);
    $messages = htmlspecialchars($_REQUEST['messages']);
    $user = htmlspecialchars($_REQUEST['username']);
    
    $sql = "INSERT INTO donorlist (FullName, Mobile, Email, BloodGroup, Descriptions, User)
            VALUES ('$name' , '$mobile', '$email', '$bloodgroup', '$messages', '$user')";

    mysqli_multi_query($conn,$sql);
    ?>
    
    <script type="text/javascript">
    document.getElementById("send").onclick = function () {
        location.href = "index.php";
    };
    </script>
    <?php
}
?>

</body>
</html>
