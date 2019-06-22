<?php
 
include 'config.php';
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId = 0;
 
 $email = $_POST['email'];
 
 $ImageData = $_POST['image_data'];
 
 $ImageName = $_POST['image_tag'];
 
 $ImagePath = "upload/$ImageName.jpg";
 
 $ServerURL = $_POST['server_url'];
 
 $InsertSQL = "UPDATE data_aktivitas SET image_path='$ServerURL' where email='$email'";
 
 if(mysqli_query($conn, $InsertSQL)){
 
 file_put_contents($ImagePath,base64_decode($ImageData));
 
 echo "Image Has Been Uploaded and closing succesfully";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 }
 
?>