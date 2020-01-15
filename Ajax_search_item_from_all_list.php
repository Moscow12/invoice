<?php
include("connection.php");
session_start();
    if(isset($_POST['seach_Item'])){
      $seach_Item =$_POST['seach_Item'];
    }else{
      $seach_Item="0";
    }

    $search_result = mysqli_query($conn, "SELECT Quantity,ps.Product_ID,Selling_price,buying_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps WHERE  ps.Product_ID=tp.Product_ID AND product_name LIKE '%$seach_Item%'") or die(mysqli_error($conn));
    $num=1;
    if((mysqli_num_rows($search_result))>0){
      while($rows = mysqli_fetch_assoc($search_result)){
        $Product_ID = $rows['Product_ID'];
        $item = $rows['product_name'];
        $price = $rows['Selling_price'];
        $unit = $rows['product_unit'];
        $balance = $rows['Quantity'];


        echo "<tr id='cellselected'>
                <td>".$num++."</td>
                <td aligne='center'>$item($unit)<input value='$Product_ID' name='Product_ID' Style='display:none'></td>
                <td>$price<input id='price' style='display:none'  value='$price' ></td>
                <td align='center'> $balance<input id='balance'  value=' $balance' style='display:none'></td>
                <td><input class='form-control' name='quantity' id=' 'id'.$Product_ID' placeholder='Quantity' ></td>
                <td><input  type='button' class='btn btn-success' value='SALE'  onclick='cell_that_product($Product_ID)'></td>
              </tr>";

        }
      }else{
        echo "<tr>
                  <td colspan='6'>
                    No item found Write correct Item name!!!
                  </td>
              </tr>";
      }
