<?php
include("connection.php");
session_start();
 if(isset($_POST['Customer_ID'])){
    $Customer_ID=$_POST['Customer_ID'];

      $session_ID = $_SESSION['User_ID'];
    ?>

<table class="table">
<?php
$sql_select_attached_item_result=mysqli_query($conn,"SELECT tp.Product_ID,  Selling_price,product_name,product_unit FROM  tbl_product tp, tbl_product_store ps where  ps.Product_ID=tp.Product_ID  NOT IN(SELECT Product_ID FROM tbl_proformer_invoice tpi WHERE tpi.User_ID='$session_ID' AND  Customer_ID='$Customer_ID' AND DATE(tpi.created_at)=CURDATE())") or die(mysqli_error($conn));
           if(mysqli_num_rows($sql_select_attached_item_result)>0){
                                $count=1;
                                while($item_rows=mysqli_fetch_assoc($sql_select_attached_item_result)){
                                  $Product_ID = $item_rows['Product_ID'];
                                  $item = $item_rows['product_name'];
                                  $price = $item_rows['Selling_price'];
                                  $unit = $item_rows['product_unit'];
                                  $balance = $item_rows['Quantity'];
                                    echo "<tr>
                                                <td>
                                                    <label style='font-weight:normal'>
                                                        <input type='checkbox'class='Product_ID' name='Product_ID' value='$Product_ID'>
                                                    </label>
                                                </td>
                                                <td>$item ($unit)</td>
                                                <td>$price</td>
                                                <td>$balance</td>
                                          </tr>";
                                }
                            }else{
              $sql_select_item_result=mysqli_query($conn, "SELECT Quantity,ps.Product_ID,Selling_price,buying_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps WHERE   ps.Product_ID=tp.Product_ID limit 50") or die(mysqli_error($conn));
                    if(mysqli_num_rows($sql_select_item_result)>0){
                                $count=1;
                                while($item=mysqli_fetch_assoc($sql_select_item_result)){
                                  $Product_ID = $category_rows['Product_ID'];
                                  $item = $category_rows['product_name'];
                                  $price = $category_rows['Selling_price'];
                                  $unit = $category_rows['product_unit'];
                                  $balance = $category_rows['Quantity'];
                                    echo "<tr>
                                                <td>
                                                    <label style='font-weight:normal'>
                                                        <input type='checkbox'class='Product_ID' name='Product_ID' value='$Product_ID'>
                                                    </label>
                                                </td>
                                                <td>$item ($unit)</td>
                                                <td>$price</td>
                                                <td>$balance</td>
                                          </tr>";
                                }
                            }
                        }
 ?>
</table>
    <?php
 }

?>
