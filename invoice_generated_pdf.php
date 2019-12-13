ff
<?php
    include("connection.php");
      session_start();
          if(isset($_POST['Customer_ID'])){
            $Customer_ID =$_POST['Customer_ID'];
          }else{
            $Customer_ID="0";
          }
          $session_ID = $_SESSION['User_ID'];
      $customer_name= "";
      $Query_name = mysqli_query($conn, "SELECT cp.Cell_ID cp.Customer_ID,cp.Product_ID Client_name, cp.User_ID FROM  tbl_cell_product cp, tbl_product p WHERE cp.Customer_ID='$Customer_ID' AND cp.Product_ID=p.Product_ID") or die(mysqli_error($conn));
      if((mysqli_num_rows($Query_name))>0){
        while($name = mysqli_fetch_assoc($Query_name)){
          $customer_name = $name['Client_name'];
          echo $customer_name;
        }
      }else{
        echo "<h5 style='color:red'>No customer selected click Client button to select Customer</h5>";
      }
        $product_list = mysqli_query($conn, "SELECT * FROM tbl_product where User_ID='$session_ID'");

 ?>

 ?>
