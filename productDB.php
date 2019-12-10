<?php
include("connection.php");
session_start();

      // if(isset($_POST['productitem'])){
      //   $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
      //   $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
      //   $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
      //   $product_unit = mysqli_real_escape_string($conn, $_POST['product_unit']);
      //   $User_ID = $_SESSION['User_ID'];
      //
      // $account = mysqli_query($conn, "INSERT INTO tbl_product(product_name, product_description, product_price,product_unit, User_ID)
      // VALUES('$product_name','$product_description','$product_price', '$product_unit', '$User_ID')");
      //   if(!$account){
      //     die("Couldn't insert  data" .mysqli_error($conn) );
      //   }else{
      //   header("location: dashboard.php");
      //   }
      // }
      //
      // if(isset($_POST['client_details'])){
      //   $Client_name = mysqli_real_escape_string($conn, $_POST['Client_name']);
      //   $Clint_PhoneNumber = mysqli_real_escape_string($conn, $_POST['Clint_PhoneNumber']);
      //   $client_email = mysqli_real_escape_string($conn, $_POST['client_email']);
      //   $postaladdress = mysqli_real_escape_string($conn, $_POST['postaladdress']);
      //   $client_region = mysqli_real_escape_string($conn, $_POST['client_region']);
      //   $client_district = mysqli_real_escape_string($conn, $_POST['client_district']);
      //   $client_street = mysqli_real_escape_string($conn, $_POST['client_street']);
      //   $client_block = mysqli_real_escape_string($conn, $_POST['client_block']);
      //   $User_ID = $_SESSION['User_ID'];
      //
      // $account = mysqli_query($conn, "INSERT INTO tbl_customer_registraion(Client_name, Clint_PhoneNumber, client_email,postaladdress,client_region,client_district, client_street,client_block, User_ID)
      // VALUES('$Client_name','$Clint_PhoneNumber','$client_email', '$postaladdress', '$client_region','$client_district','$client_street', '$client_block', '$User_ID')");
      //   if(!$account){
      //     die("Couldn't insert  data" .mysqli_error($conn) );
      //   }else{
      //   header("location: dashboard.php");
      //   }
      // }

      if(isset($_POST['upload'])){
        $msg = "";
        $image = $_FILES['user_photo']['name'];
        $target = "images/".basename($image);
        $User_ID = $_SESSION['User_ID'];

        $sql = mysqli_query($conn, "UPUDATE user SET user_photo='$image' WHERE User_ID='$User_ID'");

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        		$msg = "Image uploaded successfully";
        	}else{
        		$msg = "Failed to upload image";
        	}

      }
?>
