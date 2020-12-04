<?php

$conn = mysqli_connect("localhost", "root", "", "usersdb");
if(!$conn){
    print "Error";
}else{
    print "Connection Ok";
}

$qr1 = "select * from login";
$res = mysqli_query($conn, $qr1);
if(mysqli_num_rows($res) > 0){
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<br> UserName = ".$row["user_name"] . " Password = " . $row["pass_word"];
    }
}else{
    echo "0 results";
}


?>