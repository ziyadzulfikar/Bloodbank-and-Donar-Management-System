<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?>
    <body id="page-top">
        <?php include('includes/navbar.php'); ?>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To</div>
                <div class="masthead-heading text-uppercase">BLOOD BANK</div>
                <a class="btn btn-warning btn-lg text-uppercase js-scroll-trigger" href="#services">Donor Details</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                <?php
                    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                ?>
                  <h2 class="section-heading text-uppercase">Donors</h2>
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">
                        <span><i class="fas fa-search"></i></span> Search
                        </button>
                    <?php
                    }else{                        
                ?>
                    <h2 class="section-heading text-uppercase">My Donors List</h2>
                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">
                      <span><i class="fas fa-search"></i></span> Search
                        </button>
                <?php
                    }
                ?>                   
    
                </div>
                <div class="row text-center">
                <?php

                    $conn = mysqli_connect("localhost", "root", "", "blood");
                    if(!$conn){
                        print "Error";
                    }
                
                    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                        $qr1 = "select * from donorlist";
                        $res = mysqli_query($conn, $qr1);
                        if(mysqli_num_rows($res) > 0){
                            while ($row = mysqli_fetch_assoc($res)) {
                    ?>                            
                        <div class="col-lg-3">
                            <div class="card mx-auto mt-4" style="width: 18rem;">
                            <img class="card-img-top" src="blood.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title mt-2"><?php echo $row["FullName"]  ?><span class="badge badge-success ml-3"><?php echo $row["BloodGroup"] ?></span></h5>
                                    <p class="card-text"><?php
                                        echo "Email: " . $row["Email"]  . "<br />" ;
                                        echo "Mobile: " . $row["Mobile"] . "<br />" ;
                                        echo "Blood Group: " . $row["BloodGroup"];
                                        echo "<br />" . $row["Descriptions"]; 
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php
                        }else{
                            echo "0 results";
                        }
                    }else{
                            $qr1 = "select * from donorlist";
                            $res = mysqli_query($conn, $qr1);
                            if(mysqli_num_rows($res) > 0){
                                while ($row = mysqli_fetch_assoc($res)) {
                                    if($row["User"] == $_SESSION["username"]){
                        ?>                            
                            <div class="col-lg-4">
                            <div class="card mx-auto mt-4" style="width: 18rem;">
                            <img class="card-img-top" src="blood.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title mt-2"><?php echo $row["FullName"]  ?><span class="badge badge-success ml-3"><?php echo $row["BloodGroup"] ?></span></h5>
                                <p class="card-text"><?php
                                    echo "Email: " . $row["Email"]  . "<br />" ;
                                    echo "Mobile: " . $row["Mobile"] . "<br />" ;
                                    echo "Blood Group: " . $row["BloodGroup"];
                                    echo "<br />" . $row["Descriptions"]; 
                                    ?>
                                </p>
                                <form action='delete.php?id="<?php echo $row["id"]; ?>"' method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <input class="btn btn-danger" type="submit" name="submit" value="Delete">
                                </form>
                            </div>
                            </div>
                            </div>
                            <?php }
                            } 
                            ?>
                            <?php
                            }else{
                            ?>
                                <h2 class="section-heading text-uppercase">Nothing to Display</h2>
                            <?php
                            }
                            }
                        
                    ?>
                </div>
            </div>
        </section>
        
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/user.png" alt="" />
                            <h4>Afsal Kabeer</h4>
                            <p class="text-muted">Lorem Ipsum</p>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-twitter"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-facebook-f"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/user.png" alt="" />
                            <h4>Safwana</h4>
                            <p class="text-muted">Lorem Ipsum</p>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-twitter"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-facebook-f"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/user.png" alt="" />
                            <h4>Jinan</h4>
                            <p class="text-muted">Lorem Ipsum</p>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-twitter"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-facebook-f"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/user.png" alt="" />
                            <h4>Jaseem</h4>
                            <p class="text-muted">Lorem Ipsum</p>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-twitter"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-facebook-f"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/user.png" alt="" />
                            <h4>Sourav</h4>
                            <p class="text-muted">Lorem Ipsum</p>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-twitter"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-facebook-f"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/user.png" alt="" />
                            <h4>Ziyad</h4>
                            <p class="text-muted">Lorem Ipsum</p>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-twitter"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-facebook-f"></i></a>
                            <a class="buttonuser btn btn-dark btn-social mx-2" style="background: #4b0000ad;" href="#!"><i class="buttonUserPadding fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>
        
        <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <input class="form-control mb-4" id="tableSearch" type="text" placeholder="Search..">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Blood Group</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                        
                        <?php
                        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                                $qr1 = "select * from donorlist";
                                $res = mysqli_query($conn, $qr1);
                                if(mysqli_num_rows($res) > 0){
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                        <td><?php echo $row["FullName"] ?></td>
                                        <td><?php echo $row["Mobile"] ?></td>
                                        <td><?php echo $row["BloodGroup"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                }else{
                                    echo "0 results";
                                }
                            }else{
                                $qr1 = "select * from donorlist";
                                $res = mysqli_query($conn, $qr1);
                                if(mysqli_num_rows($res) > 0){
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        if($row["User"] == $_SESSION["username"]){
                                            ?>
                                        <tr>
                                        <td><?php echo $row["FullName"] ?></td>
                                        <td><?php echo $row["Mobile"] ?></td>
                                        <td><?php echo $row["BloodGroup"] ?></td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        
                    </tbody>
                </table>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

    </div>
  </div>
</div>
        
        <?php include('includes/footer.php'); ?>
        <script>
          // Filter table

            $(document).ready(function(){
            $("#tableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });

        </script>
    </body>
</html>