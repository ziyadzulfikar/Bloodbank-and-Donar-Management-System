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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<?php include('includes/header.php'); ?>
<body>
    <?php include('includes/navbar.php'); ?>
    <?php

        $conn = mysqli_connect("localhost", "root", "", "blood");
        if(!$conn){
            print "Error";
        }

        $qr1 = "select * from donorlist";
        $res = mysqli_query($conn, $qr1);
        if(mysqli_num_rows($res) > 0){
        ?>
            <div class="container" style="margin-top: 200px;">
                <div class="row">
                    <table id="donorlist" class="table mt-5">
                        <thead style="background:#440000;" class="text-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">FullName</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Description</th>
                            <th scope="col">User</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
        <?php
            while ($row = mysqli_fetch_assoc($res)) {
    ?>            
        
        
            <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row["FullName"]  ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Mobile']; ?></td>
            <td><?php echo $row['BloodGroup']; ?></td>
            <td><?php echo $row['Descriptions']; ?></td>
            <td><?php echo $row['User']; ?></td>
            <td class="contact-delete">
                    <form action='delete.php?id="<?php echo $row["id"]; ?>"' method="POST">
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                        <input class="btn btn-danger" type="submit" name="submit" value="Delete">
                    </form>
            </td>
            </tr>
        

                        
        <?php            
                
                // echo "<br> UserName = ".$row["user_name"] . " Password = " . $row["pass_word"];
            }
        ?>
                        </tbody>
                    </table>
                </div>                        
            </div>
            
        <?php
        }else{
            echo "0 results";
        }


        ?>

        <div class="pt-5 mt-2">
        <?php include('includes/footer.php'); ?>
        </div>
        
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
                $('#donorlist').DataTable();
            } );
        </script>
</body>
</html>