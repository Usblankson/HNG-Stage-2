<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resume";


// Create connection
  $connection = mysqli_connect($servername, $username, $password, $dbname);
 

 if(isset($_POST['sendmessage'])) {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];
     $mailTo ="uyohoiniblankson11@gmail.com";
     $headers = "From: ".$mailFrom;
     $txt = "You have received an email from ".$name." \n\n".$message;

     mail($mailTo, $subject, $txt, $headers);
     header("location index.php?mailsent");
    
     $query ="INSERT INTO contacts (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";
     $query_run = mysqli_query($connection, $query);

     if($query_run){
         echo "Contact Received Successfully";

         $_SESSION['status'] = "Contact Saved";
         header('location: index.php');
     }
     else{
         //echo "Contact not Sent";
         $_SESSION['status'] = "Contact Saved";
         header('location: index.php');
     }
 }

?>