<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['User_ID'])){
      session_destroy();
      header("Location:index.php");
    }
    if(isset($_POST['Invoice_ID'])){
      $Invoice_ID = $_POST['Invoice_ID'];
    }else{
      $Invoice_ID="";
    }
    // if(isset($_POST['Customer_ID'])){
    //   $Customer_ID = $_POST['Customer_ID'];
    // }else{
    //   $Customer_ID=""
    // }

    if(isset($_POST['btnduedate'])){
        $Customer_ID = $_POST['Customer_ID'];
        $duedate = $_POST['duedate'];
        $User_ID = $_SESSION['User_ID'];
        $saveduedate =mysqli_query($conn, "INSERT INTO tbl_invoice(Customer_ID, duedate, User_ID) VALUES('$Customer_ID', '$duedate', '$User_ID') ") or die(mysqli_error($conn));
        if(!$saveduedate){
          echo "fail";
        }else{
          echo 'success';
          }
      }

        // $select_incoice = mysqli_query($conn, "SELECT Invoice_ID, duedate FROM tbl_invoice WHERE Customer_ID='$Customer_ID' AND User_ID='$session_ID' AND DATE(created_at)=CURDATE()") or die(mysqli_error($conn));
        //
        // if((mysqli_num_rows($select_incoice))>0){
        //   while($Incoice_ID = mysqli_fetch_assoc($select_incoice)){
        //     $Invoice_ID= $Incoice_ID['Invoice_ID'];
        //     $duedate = $Incoice_ID['duedate'];
        //    }
        // }
        // echo $duedate;

?>
