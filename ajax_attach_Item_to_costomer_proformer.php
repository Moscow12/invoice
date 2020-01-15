<?php
include("connection.php");
session_start();
$Customer_ID="0";
  $session_ID = $_SESSION['User_ID'];
if(isset($_POST['selectedCategory'])){
    $selectedCategory=$_POST['selectedCategory'];
    $Customer_ID=$_POST['Customer_ID'];

    foreach ($selectedCategory as $Product_ID){
         $Product_ID;
         // $select_Item_result = mysqli_query($conn, "SELECT Product_ID FROM tbl_mtuha_treatment_category WHERE Product_ID='$Product_ID'") or die(mysqli_error($conn));
         // if((mysqli_num_rows($select_Item_result))>0){

         //     $sql_attacheID_Update = mysqli_query($conn, "UPDATE tbl_mtuha_treatment_category SET Customer_ID='$Customer_ID' WHERE Product_ID='$Product_ID'") or die(mysqli_error($conn));
         // }else{
         $sql_attache_result=mysqli_query($conn,"INSERT  INTO tbl_proformer_invoice (Product_ID, Customer_ID, User_ID) VALUES('$Product_ID', '$Customer_ID', '$session_ID')") or die(mysqli_error($conn));
        // }
        }
}
?>

<table class="table">
<?php
$Customer_ID=$_POST['Customer_ID'];
$sql_select_attached_item_result=mysqli_query($conn,"SELECT tpi.Customer_ID,  tpi.Product_ID,  Selling_price,product_name,product_unit FROM tbl_proformer_invoice tpi, tbl_product tp, tbl_product_store ps where tpi.User_ID='$session_ID' AND ps.Product_ID=tp.Product_ID AND tp.Product_ID=tpi.Product_ID AND tpi.Customer_ID='$Customer_ID'AND DATE(tpi.created_at)=CURDATE()") or die(mysqli_error($conn));
           if(mysqli_num_rows($sql_select_attached_item_result)>0){
                                $count=1;
                                while($category_rows=mysqli_fetch_assoc($sql_select_attached_item_result)){
                                    $Product_ID=$category_rows['Product_ID'];
                                    $Product_Name=$category_rows['product_name'];
                                    $price = $category_rows['Selling_price'];
                                    $unit =$category_rows['product_unit'];
                                    echo "<tr>
                                                <td style='width:50px'>
                                                  ".$count++."
                                                </td>
                                                <td>
                                                    $Product_Name($unit)
                                                </td>
                                                <td>$price</td>
                                          </tr>";

                                }
                            }
 ?>
</table>
