<?php
    include("connection.php");
    session_start();
    $session_ID = $_SESSION['User_ID'];

    if(isset($_POST['Customer_ID'])){
      $Customer_ID =$_POST['Customer_ID'];
    }else{
      $Customer_ID="0";
    }
    $customer_name= "";
    //die("SELECT Customer_ID, Client_name FROM tbl_customer_registraion WHERE Customer_ID='$Customer_ID'");
    $Query_name = mysqli_query($conn, "SELECT Customer_ID, Client_name FROM tbl_customer_registraion WHERE Customer_ID='$Customer_ID'") or die(mysqli_error($conn));
    if((mysqli_num_rows($Query_name))>0){
      while($name = mysqli_fetch_assoc($Query_name)){
        $customer_name = $name['Client_name'];
      }
    }else{
      echo "<h5 style='color:red'>No customer selected click Client button to select Customer</h5>";
    }
      $product_list = mysqli_query($conn,"SELECT Quantity,ps.Product_ID,Selling_price,buying_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps WHERE ps.User_ID='$session_ID' AND ps.Product_ID=tp.Product_ID") or die(mysqli_error($conn));

     ?>
          <p>
            <fieldset>

                  <form action="" method="post">
                    <div style='height:200px;overflow-y:scroll'>
                    <table class="table table-bordered table-responsive" >
                        <thead>
                          <th>#</th>
                          <th>Product name</th>
                          <th>Price(Tsh.)</th>
                          <th>Balance</th>
                          <th>Quantity</th>
                          <th>Action</th>
                        </thead>

                        <tbody>
                          <input type="text" id="selected_customer_id" name="Customer_ID" value="<?php echo $Customer_ID;?>" style="display:none">
                          <?php

                              $num= 1;
                              while($rows = mysqli_fetch_assoc($product_list)){
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
                            <td align="center"><?php echo $balance;?><input id='balance'  value="<?php echo $balance; ?>" style="display:none"></td>
                            <td><input class="form-control" name="quantity" id="<?php echo "id".$Product_ID; ?>" placeholder="Quantity" ></td>
                            <td><input  type="button" class="btn btn-info" value="CELL"  onclick="cell_that_product('<?php echo $Product_ID;?>')"></td>
                          </tr>
                        <?php }?>

                        </tbody>

                    </table></div>
                  </form>

            </fieldset>
            <fieldset>

              <div class="" id="div_show_product_sold_now">
                  <center><h3 >PRODUCT SOLD TO <span style="background-color:#ccffcc;"><?php echo $customer_name; ?></span>  </h3></center>
                  <input type="text" hidden name="" id="Customer_ID" value="<?php echo $Customer_ID; ?>">

                  <fieldset>
                    <div style='height:200px;overflow-y:scroll'>
                      <table class="table table-striped table-responsive" >
                          <thead>
                            <th>#</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Remove</th>
                          </thead>
                          <tbody id="product_sold_today" >

                          </tbody>
                      </table>
                    </div>
                      <button class="tablinks btn-info" onclick="openform(event, 'preview_invoice_div');preview_invoice()">Preview Invoice</button>
                  </fieldset>
              </div>
            </fieldset>
