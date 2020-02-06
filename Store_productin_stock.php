
<?php
    include("connection.php");
      session_start();
          if(!isset($_SESSION['User_ID'])){
            session_destroy();
            header("Location:index.php");
          }
          if(isset($_POST['Product_ID'])){
            $Product_ID =$_POST['Product_ID'];
          }else{
            $Customer_ID=0;
          }
          if(isset($_POST['Selling_price'])){
            $Selling_price = $_POST['Selling_price'];
          }else{
            $Selling_price=0;
          }
          if(isset($_POST['buying_price'])){
            $buying_price =$_POST['buying_price'];
          }else{
            $buying_price=0;
          }
          if(isset($_POST['Quantity'])){
            $Quantity = $_POST['Quantity'];
          }else{
            $Quantity=0;
          }

          $session_ID = $_SESSION['User_ID'];
          if(isset($_POST['stock'])){
            $Quantity = mysqli_real_escape_string($conn, $_POST['Quantity']);
            $Product_ID = mysqli_real_escape_string($conn, $_POST['Product_ID']);
            $Selling_price = mysqli_real_escape_string($conn, $_POST['Selling_price']);
            $buying_price = mysqli_real_escape_string($conn, $_POST['buying_price']);

              $store_product = mysqli_query($conn, "INSERT INTO tbl_product_store(Quantity,Product_ID,Selling_price,buying_price, User_ID)
              VALUES('$Quantity','$Product_ID', '$Selling_price','$buying_price','$session_ID')") or die(mysqli_error($conn));

              if(!$store_product){
                echo "fail";
              }else{
                echo "success";
              }
          }

          $select_product_inStore = mysqli_query($conn, "SELECT Quantity,ps.Product_ID,Selling_price,buying_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps WHERE ps.Product_ID=tp.Product_ID") or die(mysqli_error($conn));
          $sn=0;
          if((mysqli_num_rows($select_product_inStore))>0){
            while($result = mysqli_fetch_assoc($select_product_inStore)){
              $product_unit = $result['product_unit'];
              $Quantity = $result['Quantity'];
              $buying_price = $result['buying_price'];
              $product_name = $result['product_name'];
              $Selling_price =$result['Selling_price'];
              $buying_price =$result['buying_price'];
              $sn++;

              echo "<tr><td>$sn</td><td>$product_name&nbsp;($product_unit)</td><td>$Selling_price</td><td>$buying_price</td><td>$Quantity</td></tr>";
            }
          }
