<?php
  include("connection.php");
  session_start();
  $user_ID = $_SESSION['User_ID'];
  $sql = mysqli_query($conn,"SELECT * FROM user WHERE User_ID='$user_ID'");
  //die("SELECT * FROM user WHERE user_ID='$user_ID'");
  while($rows = mysqli_fetch_assoc($sql)){
  $session_ID = $rows['User_ID'];
  $session_fullname = $rows['fullname'];
  $session_password = $rows['password'];
  $session_username = $rows['user_name'];
  $session_phonenumber = $rows['phone_number'];
  $session_email= $rows['email'];


}

?>
