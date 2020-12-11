<?php
//initilize PHP

if($_POST['submit']) //If submit is hit
{
    $conn = mysqli_connect("localhost", "root", "", "blood");
    if(!$conn){
        print "Error";
    }

   //convert all the posts to variables:
   $id = $_POST['id'];


   $result=mysqli_query($conn, "DELETE FROM donorlist WHERE id='$id'") or die(mysqli_error()); 

    //confirm
   echo "Patient removed. <a href=/blood/admin>Return to Dashboard</a>"; 
}
?>