<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?>
<body>
    <?php include('includes/navbar.php'); ?>
    <?php

        $conn = mysqli_connect("localhost", "root", "", "blood");
        if(!$conn){
            print "Error";
        }else{
            print "Connection Ok";
        }

        $qr1 = "select * from donorlist";
        $res = mysqli_query($conn, $qr1);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                
                echo '
                    <div class="container">
                        <div class="col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                ';
                // echo "<br> UserName = ".$row["user_name"] . " Password = " . $row["pass_word"];
            }
        }else{
            echo "0 results";
        }


        ?>
    
</body>
</html>