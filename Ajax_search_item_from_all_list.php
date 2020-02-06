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


      ?>
      <tr id="cellselected">
        <td><?php echo $num++; ?></td>
        <td align="center"><?php echo $item;?> (<?php echo $unit; ?>)<input name="Product_ID"  value="<?php echo $Product_ID; ?>" style="display:none"></td>
        <td align="center"><?php echo $price; ?><input id="price"style="display:none" value="<?php echo $price; ?>"></td>
        <td align="center"><?php echo $balance;?><input id='balance<?= $Product_ID ?>'  value="<?php echo $balance; ?>" style="display:none"></td>
        <td><input class="form-control" name="quantity" id="<?php echo "id".$Product_ID; ?>" placeholder="Quantity" ></td>
        <td>
          <input  type="button" class="btn btn-success" value="SALE"  onclick="cell_that_product('<?php echo $Product_ID;?>')">
        </td>
      </tr>
    <?php
        }
      }else{
        echo "<tr>
                  <td colspan='6'>
                    No item found Write correct Item name!!!
                  </td>
              </tr>";
      }
