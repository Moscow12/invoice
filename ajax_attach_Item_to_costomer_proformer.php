<?php
include("connection.php");
session_start();
$Customer_ID="0";
  $session_ID = $_SESSION['User_ID'];
    if(isset($_POST['selectedCategory'])){
        $selectedCategory=$_POST['selectedCategory'];
        $Customer_ID=$_POST['Customer_ID'];
        //================================

        $Proformer = "SELECT Proformer_ID FROM tbl_Proformer WHERE Customer_ID = '$Customer_ID' AND DATE(created_at)=CURDATE()";
                $Proformer_result=mysqli_query($conn,$Proformer) or die(mysqli_error($conn));
                if(mysqli_num_rows($Proformer_result)>0){
                    $Proformer_ID = mysqli_fetch_assoc($Proformer_result)['Proformer_ID'];
                }else{

                    $sql_insert_profomer_record = mysqli_query($conn, "INSERT INTO tbl_Proformer(Customer_ID,  User_ID) VALUES('$Customer_ID', '$session_ID')") or die(mysqli_error($conn));
                    $Proformer_id=mysqli_insert_id($conn);
                }



                // $procedure_record = mysqli_query($conn, "SELECT Item_ID FROM tbl_anasthesia_procedure WHERE Customer_ID = '$Customer_ID' AND DATE(created_at)=CURDATE() AND Item_ID ='$Item_ID' ");
                // if((mysqli_num_rows($procedure_record))>0){
                //     $Item_ID = mysqli_fetch_assoc($procedure_record);
                // }else{
                // $sql_insert_selected_procedure_result=mysqli_query($conn,"INSERT INTO tbl_anasthesia_procedure(created_at, Proformer_ID, Item_ID, Employee_ID, Registration_Id) VALUES(NOW(), '$Proformer_id', '$Item_ID','$Employee_ID', '$Customer_ID' )") or die(mysqli_error($conn));
                // }

        //======================================
        foreach ($selectedCategory as $Product_ID){
             $Product_ID;
             $select_Item_result = mysqli_query($conn, "SELECT Product_ID FROM tbl_proformer_invoice WHERE Product_ID='$Product_ID' AND Customer_ID='$Customer_ID' AND Proformer_ID='$Proformer_ID'") or die(mysqli_error($conn));
             if((mysqli_num_rows($select_Item_result))>0){
                $Product_ID = mysqli_fetch_assoc($select_Item_result);
              }else{
             $sql_attache_result=mysqli_query($conn,"INSERT  INTO tbl_proformer_invoice (Product_ID, Customer_ID, User_ID, Proformer_ID) VALUES('$Product_ID', '$Customer_ID', '$session_ID', '$Proformer_ID')") or die(mysqli_error($conn));
             }
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
                                                <td>".number_format($price)."</td>
                                          </tr>";

                                }
                            }
 ?>
</table>
