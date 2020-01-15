<?php
include("connection.php");
session_start();
    if(isset($_POST['Customer_ID'])){
      $Customer_ID =$_POST['Customer_ID'];
    }else{
      $Customer_ID=0;
    }
    $session_ID = $_SESSION['User_ID'];
    if(isset($_POST['Cell_ID'])){
      $Cell_ID = $_POST['Cell_ID'];
    }else{
      $Cell_ID=0;
    }
    // if(isset($_POST['start_date'])){
    //   $start_date = $_POST['start_date'];
    // }else{
    //   $start_date='00:00';
    // }
    // if(isset($_POST['end_date'])){
    //   $end_date = $_POST['end_date'];
    // }else{
    //   $end_date='00:00';
    // }

    $sales = mysqli_query($conn, "SELECT Customer_ID,  cp.Quantity, ps.Product_ID, Cell_ID, Selling_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps, tbl_cell_product cp where cp.User_ID='$session_ID' AND ps.Product_ID=cp.Product_ID AND tp.Product_ID=cp.Product_ID AND Customer_ID='$Customer_ID'") or die(mysqli_error($conn));
    //AND DATE(cp.created_at) BETWEEN '$start_date' AND '$end_date'
    ///die("SELECT Customer_ID,  cp.Quantity, ps.Product_ID, Cell_ID, Selling_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps, tbl_cell_product cp where cp.User_ID='$session_ID' AND ps.Product_ID=cp.Product_ID AND tp.Product_ID=cp.Product_ID AND Customer_ID='$Customer_ID'AND DATE(cp.created_at) BETWEEN $start_date AND $end_date");

      $product_sold_list = mysqli_query($conn, "SELECT Customer_ID,  cp.Quantity, ps.Product_ID, Cell_ID, Selling_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps, tbl_cell_product cp where cp.User_ID='$session_ID' AND ps.Product_ID=cp.Product_ID AND tp.Product_ID=cp.Product_ID AND Customer_ID='$Customer_ID'AND DATE(cp.created_at)=CURDATE()") or die(mysqli_error($conn));
      if((mysqli_num_rows($product_sold_list))>0){
        $num=0;
        $Total="";
        while($rows = mysqli_fetch_assoc($product_sold_list)){
          $Cell_ID = $rows['Cell_ID'];
          $product_name = $rows['product_name'];
          $price = $rows['Selling_price'];
          $quantity = $rows['Quantity'];
          $amount = $price * $quantity;
          $Total += $amount;
          $num++;
          echo "<tr><td>".$num."</td>";
          echo "<td>".$product_name."</td>";
          echo "<td>".$price."</td>";
          echo "<td>".$quantity."</td>";
          echo "<td>".$amount."</td>";
          echo "<td><button onclick='remove_product($Cell_ID)' name='removebtn' class='btn btn-danger'><span class='fa fa-remove'></span></button></td></tr>";

        }
        echo "<tr><th colspan='4'>Total</th><td >".$Total."</td></tr>";

      }else{
        echo "<tr><td colspan='6'>NO Product Sold Today </td></tr>";
      }

      if(isset($_POST['removebtn'])){
        $remove_item_selected = "DELETE FROM `tbl_cell_product` WHERE Cell_ID = '$Cell_ID' AND User_ID='$session_ID'";
        $remove_item_selected_result = mysqli_query($conn, $remove_item_selected);
      }

    ?>
