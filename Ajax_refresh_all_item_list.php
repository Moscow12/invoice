<?php
    include("connection.php");
    session_start();
     if(isset($_POST['Customer_ID'])){
        $Customer_ID=$_POST['Customer_ID'];

          $session_ID = $_SESSION['User_ID'];
        ?>

    <table class="table">
<?php
      $sql_select_attached_item_result= mysqli_query($conn,"SELECT ps.Product_ID, Quantity, Selling_price,
        buying_price,product_name,product_unit FROM  tbl_product tp, tbl_product_store ps, tbl_proformer_invoice tpi
          where  ps.Product_ID=tp.Product_ID AND tpi.User_ID='$session_ID' AND ps.Product_ID=tpi.Product_ID
           AND  tpi.Customer_ID='$Customer_ID' AND DATE(tpi.created_at)=CURDATE()") or die(mysqli_error($conn));
    //  $sql_select_attached_item_result= mysqli_query($conn,"SELECT ps.Product_ID, Quantity, Selling_price,buying_price,product_name,product_unit FROM  tbl_product tp, tbl_product_store ps where  ps.Product_ID=tp.Product_ID  NOT IN (SELECT Product_ID FROM tbl_proformer_invoice WHERE User_ID='$session_ID' AND  Customer_ID='$Customer_ID' AND DATE(created_at)=CURDATE())") or die(mysqli_error($conn));
//$sql_select_attached_item_result=mysqli_query($conn,"SELECT ps.Product_ID,  Selling_price,Quantity,buying_price,product_name,product_unit FROM  tbl_product tp, tbl_product_store ps where  ps.Product_ID=tp.Product_ID  NOT IN(SELECT Product_ID FROM tbl_proformer_invoice tpi WHERE tpi.User_ID='$session_ID' AND  Customer_ID='$Customer_ID' AND DATE(tpi.created_at)=CURDATE())") or die(mysqli_error($conn));
           if((mysqli_num_rows($sql_select_attached_item_result))>0){

                    while($item_rows=mysqli_fetch_assoc($sql_select_attached_item_result)){
                      $Product_ID = $item_rows['Product_ID'];
                      $item = $item_rows['product_name'];
                      $price = $item_rows['buying_price'];
                      $unit = $item_rows['product_unit'];
                      $balance = $item_rows['Quantity'];
                      $select_Product_id = mysqli_query($conn, "SELECT Product_ID FROM tbl_proformer_invoice WHERE User_ID='$session_ID' AND Product_ID='$Product_ID' AND Customer_ID='$Customer_ID' AND DATE(tpi.created_at)=CURDATE()");
                      if((mysqli_num_rows($select_Product_id))>0){
                        continue;
                      }
                      ?>
                                <tr>
                                    <td>
                                        <label style='font-weight:normal'>
                                            <input type='checkbox'class='Product_ID' name='Product_ID' value='<?php echo $Product_ID; ?>'>
                                        </label>
                                    </td>
                                    <td><?php echo $item."(".$unit; ?>)</td>
                                    <td><?php echo number_format($price); ?></td>
                                    <td><?php echo $balance; ?></td>
                                </tr>
                                <?php

                                }

                            }
                            else{
                              $sql_select_item_result=mysqli_query($conn,"SELECT Quantity,ps.Product_ID,Selling_price,buying_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps WHERE   ps.Product_ID=tp.Product_ID limit 50") or die(mysqli_error($conn));
                              if((mysqli_num_rows($sql_select_item_result))>0){
                                  while($category_rows=mysqli_fetch_assoc($sql_select_item_result)){
                                    $Product_ID = $category_rows['Product_ID'];
                                    $item = $category_rows['product_name'];
                                    $price = $category_rows['buying_price'];
                                    $unit = $category_rows['product_unit'];
                                    $balance = $category_rows['Quantity'];
                                    ?>
                                        <tr>
                                            <td>
                                                <label style='font-weight:normal'>
                                                    <input type='checkbox'class='Product_ID' name='Product_ID' value='<?php echo $Product_ID; ?>'>
                                                </label>
                                            </td>
                                            <td><?php echo $item."(".$unit; ?>)</td>
                                            <td><?php echo number_format($price); ?></td>
                                            <td><?php echo $balance; ?></td>
                                        </tr>
                                  <?php
                                  }
                              }
                        }
 ?>
    </table>
    <?php
  }

  ?>
