<?php
include("connection.php");
session_start();
    if(isset($_POST['Customer_ID'])){
      $Customer_ID =$_POST['Customer_ID'];
    }else{
      $Customer_ID="0";
    }
    $session_ID = $_SESSION['User_ID'];
    //die("SELECT tp.Customer_ID,  tp.Product_ID, product_name, product_price, quantity  FROM tbl_product tp, tbl_cell_product cp where User_ID='$session_ID' AND tp.Product_ID=cp.Product_ID AND Customer_ID='$Customer_ID' AND DATE(created_at)=CURDATE()");

      $product_sold_list = mysqli_query($conn, "SELECT Customer_ID,  tp.Product_ID, product_name, product_price, quantity  FROM tbl_product tp, tbl_cell_product cp where cp.User_ID='$session_ID' AND tp.Product_ID=cp.Product_ID AND Customer_ID='$Customer_ID'AND DATE(created_at)=CURDATE()") or die(mysqli_error($conn));
      if((mysqli_num_rows($product_sold_list))>0){
        $num=0;
        $Total="";
        while($rows = mysqli_fetch_assoc($product_sold_list)){
          $product_name = $rows['product_name'];
          $price = $rows['product_price'];
          $quantity = $rows['quantity'];
          $amount = $price * $quantity;
          $Total += $amount;
          $num++;
          echo "<tr><td>".$num."</td>";
          echo "<td>".$product_name."</td>";
          echo "<td>".$price."</td>";
          echo "<td>".$quantity."</td>";
          echo "<td>".$amount."</td></tr>";

        }
        echo "<tr><th colspan='4'>Total</th><td >".$Total."</td></tr>";

      }else{
        echo "<tr><td colspan='5'>NO Product Sold Today </td></tr>";
      }
 ?>
