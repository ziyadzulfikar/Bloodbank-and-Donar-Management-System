<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?>
<body>
    <?php include('includes/navbar.php'); ?>
    
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

        // if( isset($_POST['contact-form']) )
        // {
        //     $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
        //     $mobile = mysqli_real_escape_string($conn, $_REQUEST['mobile']);
        //     $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
        //     $bloodgroup = mysqli_real_escape_string($conn, $_REQUEST['bloodgroup']);
        //     $messages = mysqli_real_escape_string($conn, $_REQUEST['messages']);
        // // if( isset($_GET['messages']) )
        // // {
        // //     $name = $_POST['messages'];
        // //     $messages = mysqli_real_escape_string($conn, $_REQUEST['messages']);
        // // }
        //     $sql = "INSERT INTO donorlist (FullName, Mobile, Email, BloodGroup, Descriptions)
        //     VALUES ('$name' , '$mobile', '$email', '$bloodgroup', '$messages')";

        //     if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        //     } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        //     }

        //     $conn->close();
        // }
    ?>
    <section class="container p-5">
    <section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Donor Details</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->   
                    <!--Grid column-->
                    <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="mobile" name="mobile" class="form-control">
                                <label for="mobile" class="">Mobile Number</label>
                            </div>
                    </div>                 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <select type="text" id="bloodgroup" name="bloodgroup" class="form-control dropdown">
                                    <option>-Choose your blood group-</option>
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
                                <label for="message">Your message</label>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                </form>

                <div class="text-center text-md-left">
                    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>San Francisco, CA 94126, USA</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 01 234 567 89</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>contact@mdbootstrap.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>

    </section>
</section>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['name']);
    $mobile = htmlspecialchars($_REQUEST['mobile']);
    $email = htmlspecialchars($_REQUEST['email']);
    $bloodgroup = htmlspecialchars($_REQUEST['bloodgroup']);
    $messages = htmlspecialchars($_REQUEST['messages']);
    
    $sql = "INSERT INTO donorlist (FullName, Mobile, Email, BloodGroup, Descriptions)
            VALUES ('$name' , '$mobile', '$email', '$bloodgroup', '$messages')";

    mysqli_multi_query($conn,$sql);
}
?>

</body>
</html>