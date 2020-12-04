<?php

    $conn = mysqli_connect("localhost", "root", "", "usersdb");
    if(!$conn){
        print "Error";
    }else{
        print "Connection Ok";
    }

    $qr1 = "insert into login (user_name, pass_word)values('shiyad', '12345');";
    $qr1.= "insert into login (user_name, pass_word)values('ziyad', '12345');";
    $qr1.= "insert into login (user_name, pass_word)values('ranees', '12345');";
    $qr1.= "insert into login (user_name, pass_word)values('salman', '12345');";

    mysqli_multi_query($conn,$qr1);


?>