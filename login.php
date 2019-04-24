<?php
$connection = mysql_connect("localhost", "root", ""); 
$db = mysql_select_db("college", $connection); 
$email=$_POST['email1']; // Fetching Values from URL.
$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.

$email = filter_var($email, FILTER_SANITIZE_EMAIL); 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Invalid Email.......";
}else{
// Matching user input email and password with stored email and password in database.
$result = mysql_query("SELECT * FROM registration WHERE email='$email' AND password='$password'");
$data = mysql_num_rows($result);
if($data==1){
echo "Successfully Logged in...";
}else{
echo "Email or Password is wrong...!!!!";
}
}
mysql_close ($connection); 
?>