<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['User_ID'])){
      session_destroy();
      header("Location:index.php");
    }
    
    // if(isset($_POST['Customer_ID'])){
    //   $Customer_ID =$_POST['Customer_ID'];
    // }else{
    //   $Customer_ID="0";
    // }
    //$session_ID = $_SESSION['User_ID'];

  // //  if(isset($_POST['invoice_button'])){
  //     $Customer_ID =$_POST['Customer_ID'];
  //
  //
  //     $select_incoice = mysqli_query($conn, "SELECT Incoice_ID FROM tbl_invoice WHERE Customer_ID='$Customer_ID' AND User_ID='$session_ID'AND DATE(created_at)=CURDATE()") or die mysqli_error($conn);
  //       if((mysqli_num_rows($select_incoice))>0){
  //         $Incoice_ID = $mysqli_fetch_assoc($select_incoice)['Incoice_ID'];
  //       }else{
  //         $session_ID = $_SESSION['User_ID'];
  //         $sql_insert_Incoice_ID mysqli_query($conn, "INSERT INTO tbl_invoice(Customer_ID,User_ID)VALUES('$Customer_ID', '$session_ID')") or die(mysqli_query($conn));
  //         $Incoice_ID = mysqli_insert_id($conn);
  //       }
  //  }

  if(isset($_POST['btnduedate'])){
    $Customer_ID = $_POST['Customer_ID'];
    $duedate = $_POST['duedate'];
    $User_ID = $_SESSION['User_ID'];
    $saveduedate =mysqli_query($conn, "INSERT INTO tbl_invoice(Customer_ID, duedate, User_ID) VALUES('$Customer_ID', '$duedate', '$User_ID') ") or die(mysqli_error($conn));
    if(!$saveduedate){
      echo "fail";
    }else{
      echo "success";
    }
  }

  ?>
