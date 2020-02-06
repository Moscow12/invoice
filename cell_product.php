      <?php
      include("connection.php");
      session_start();
      $selected_customer_id = $_POST['selected_customer_id'];
      $quantity = $_POST['quantity'];
      $Product_ID = $_POST['Product_ID'];
      $User_ID = $_SESSION['User_ID'];
      $balances=0;
      $product_list = mysqli_query($conn,"SELECT Quantity,ps.Product_ID,Selling_price,buying_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps WHERE ps.User_ID='$session_ID' AND ps.Product_ID=tp.Product_ID AND ps.Product_ID='$Product_ID'") or die(mysqli_error($conn));
        if((mysqli_num_rows($product_list))>0){
          while($rows = mysqli_fetch_assoc($product_list)){

            $Quantities =$rows['Quantity'];
            $balances = $Quantities - $quantity;
            //die("UPDATE tbl_product_store SET Quantity='$balance' WHERE Product_ID='$Product_ID'");
            $update_product_balance = mysqli_query($conn, "UPDATE tbl_product_store SET Quantity='$balances' WHERE Product_ID='$Product_ID'") or die(mysqli_error($conn));

          }
        }else{
          $sql_cell = mysqli_query($conn, "INSERT INTO tbl_cell_product (Customer_ID, quantity, Product_ID, User_ID)VALUES('$selected_customer_id','$quantity', '$Product_ID', '$User_ID')") or die(mysqli_error($conn));
          
        }

      if(!$sql_cell){
        //die(mysqli_error($conn));
        echo "nothing happened";
      }else{
        echo "success";
      }
      ?>
