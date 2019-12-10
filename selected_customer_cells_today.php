<?php
    include("connection.php");
    session_start();
    $selected_customer_id = $_POST['Customer_ID'];
    $User_ID = $_SESSION['User_ID'];

    $sql_sell_today = mysqli_query($conn, "SELECT cp.Customer_ID, cp.Product_ID, quantity, product_price, product_name FROM tbl_product tp, tbl_cell_product cp WHERE cp.Customer_ID= '$selected_customer_id' AND tp.Product_ID=cp.Product_ID AND DATE('created_at')=DATE(CURDATE()) AND User_ID='$User_ID'");

    if((mysqli_num_rows($sql_sell_today))>o){
      $num=1;
      while($row = mysqli_fetch_row($sql_sell_today)){
        $product_name = $row['product_name'];
        $quantity = $row['quantity'];
        $price = $row['product_price'];
        $num++;
        $amount = $quantity * $price;
        echo "<tr>
                  <td>$num;</td>
                  <td>$product_name;</td>
                  <td>$price;</td>
                  <td>$quantity;</td>
                  <td>$amount;</td>
              </tr>"
      }
    }
