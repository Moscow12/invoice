<?php
  include ("connection.php");
  session_start();
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  //die("SELECT User_ID, username, password FROM user where username = '$username' AND password = '$password'");
    $check_user = mysqli_query($conn, "SELECT User_ID, user_name, password FROM user where user_name = '$user_name' AND password = '$password'");

    if((mysqli_num_rows($check_user))>0){
          while($row = mysqli_fetch_assoc($check_user)){
              $User_ID = $row['User_ID'];
              $user_name =$row['user_name'];
              $password =$row['password'];
              $fullname =$row['$fullname'];
            }
            $_SESSION['User_ID'] = $User_ID;
            echo "success";

        }else{
          echo "fail";
        }
   ?>
