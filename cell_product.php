      <?php
      include("connection.php");
      session_start();
      $selected_customer_id = $_POST['selected_customer_id'];
      $quantity = $_POST['quantity'];
      $Product_ID = $_POST['Product_ID'];
      $User_ID = $_SESSION['User_ID'];
       $sql_cell = mysqli_query($conn, "INSERT INTO tbl_cell_product (Customer_ID, quantity, Product_ID, User_ID)VALUES('$selected_customer_id','$quantity', '$Product_ID', '$User_ID')");

      if(!$sql_cell){
        die(mysqli_error($conn));
      }else{
        echo "success";
      }
      ?>
