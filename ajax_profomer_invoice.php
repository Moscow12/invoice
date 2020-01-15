<?php
include("connection.php");
session_start();
    if(isset($_POST['all_item_search_box'])){
      $all_item_search_box =$_POST['all_item_search_box'];
    }else{
      $all_item_search_box="0";
    }

    $select_item_seach = mysqli_query($conn, "SELECT Quantity,ps.Product_ID,Selling_price,buying_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps WHERE   ps.Product_ID=tp.Product_ID AND product_name LIKE '%$all_item_search_box%'") or die(mysqli_error($conn));
    if(mysqli_num_rows($select_item_seach)>0){
                               $count=1;
                               while($category_rows=mysqli_fetch_assoc($select_item_seach)){
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
