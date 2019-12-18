<?php
include("connection.php");
session_start();

      if(isset($_POST['company_account'])){
        $account_type = mysqli_real_escape_string($conn, $_POST['account_type']);
        $account_name = mysqli_real_escape_string($conn, $_POST['account_name']);
        $Account_number = mysqli_real_escape_string($conn, $_POST['Account_number']);
        $User_ID = $_SESSION['User_ID'];

      $account = mysqli_query($conn, "INSERT INTO tbl_company_account(account_type, account_name, Account_number, User_ID)
      VALUES('$account_type','$account_name','$Account_number', '$User_ID')");
        if(!$account){
          die("Couldn't insert  data" .mysqli_error($conn) );
        }else{
        header("location: dashboard.php");
        }
      }


    if(isset($_POST['company_details'])){
        $companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
        $company_email = mysqli_real_escape_string($conn, $_POST['company_email']);
        $postaladdress = mysqli_real_escape_string($conn, $_POST['postaladdress']);
        $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
        $company_location = mysqli_real_escape_string($conn, $_POST['company_location']);
        $company_logo = mysqli_real_escape_string($conn, $_POST['company_logo']);
        $ceo_signature = mysqli_real_escape_string($conn, $_POST['ceo_signature']);
        $company_region = mysqli_real_escape_string($conn, $_POST['company_region']);
        $company_district = mysqli_real_escape_string($conn, $_POST['company_district']);
        $company_street = mysqli_real_escape_string($conn, $_POST['company_street']);
        $company_block = mysqli_real_escape_string($conn, $_POST['company_block']);
        $User_ID = $_SESSION['User_ID'];

        $company_detail = mysqli_query($conn, "INSERT INTO tbl_company_registration (companyname,company_email,postaladdress,phonenumber,company_region,company_district,company_street,company_block, company_logo,ceo_signature, User_ID)
        VALUES('$companyname', '$company_email', '$postaladdress', '$phonenumber', '$company_region', '$company_district','$company_street','$company_block','$company_logo', '$ceo_signature', '$User_ID')");

        if(!$company_detail){
          die("Couldn,t insert data" .mysqli_error($conn));
        }else{
          header("location: dashboard.php");
        }
    }

    if(isset($_POST['terms'])){
      $terms_condition = mysqli_real_escape_string($conn, $_POST['terms_condition']);
      $User_ID = $_SESSION['User_ID'];

      $terms mysqli_query($conn, "INSERT INTO tbl_terms_condition(terms_condition, User_ID)
       VALUES ('$terms_condition', '$User_ID') ");
      if(!$terms){
        die("Couldn,t insert data" .mysqli_error($conn));
      }else{
        header("location: dashboard.php");
      }
    }

    if(isset($_POST['add_user'])){
      $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $username = mysqli_real_escape_string($conn, $_POST['user_name']);
      $phonenumber = mysqli_real_escape_string($conn, $_POST['phone_number']);

      $password =md5($_POST['password']);

      //$User_ID = $_SESSION['User_ID'];

    $account = mysqli_query($conn, "INSERT INTO user(fullname, email, user_name, phone_number, password)
    VALUES('$fullname','$email','$username', '$phonenumber', '$password')");
      if(!$account){
        die("Couldn't insert  data" .mysqli_error($conn) );
      }else{
      header("location: dashboard.php");
      }
    }

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
