    <?php
    include("connection.php");
    session_start();
        if(isset($_POST['Customer_ID'])){
          $Customer_ID =$_POST['Customer_ID'];
        }else{
          $Customer_ID="0";
        }
        $session_ID = $_SESSION['User_ID'];

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
          $product_list = mysqli_query($conn, "SELECT * FROM tbl_product where User_ID='$session_ID'");


        $select_incoice = mysqli_query($conn, "SELECT Invoice_ID, duedate FROM tbl_invoice WHERE Customer_ID='$Customer_ID' AND User_ID='$session_ID' AND DATE(created_at)=CURDATE()") or die(mysqli_error($conn));

         ?>
      <fieldset>
            <center><h3 >PRODUCT SOLD TO <span style="background-color:#ccffcc;"><?php echo $customer_name; ?></span>  </h3></center>
            <input type="text" hidden name="" id="Customer_ID" value="<?php echo $Customer_ID; ?>">

            <fieldset>
                <table class="table table-striped table-responsive" >
                    <thead>
                      <th>#</th>
                      <th>Product name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                    </thead>
                    <tbody>

          <?php

              $product_sold_list = mysqli_query($conn, "SELECT Customer_ID,  tp.Product_ID, product_name, product_price, quantity  FROM tbl_product tp, tbl_cell_product cp where cp.User_ID='$session_ID' AND tp.Product_ID=cp.Product_ID AND Customer_ID='$Customer_ID'AND DATE(created_at)=CURDATE()") or die(mysqli_error($conn));
              if((mysqli_num_rows($product_sold_list))>0){
                $num=0;
                $Total="";
                while($rows = mysqli_fetch_assoc($product_sold_list)){
                  $product_name = $rows['product_name'];
                  $price = $rows['product_price'];
                  $quantity = $rows['quantity'];
                  $amount = $price * $quantity;
                  $Total += $amount;
                  $num++;
                  echo "<tr><td>".$num."</td>";
                  echo "<td>".$product_name."</td>";
                  echo "<td>".$price."</td>";
                  echo "<td>".$quantity."</td>";
                  echo "<td>".$amount."</td></tr>";

                }
                echo "<tr><th colspan='4'>Total</th><td >".$Total."</td></tr>";

              }else{
                echo "<tr><td colspan='5'>No Product Sold Today </td></tr>";
              }
              ?>
            </tbody>
        </table>


    </fieldset>
  </fieldset><br><br>
  <fieldset style="border:1px solid grey;">
    <center><legend align="center">SET INVOICE DATE</legend></center>
    <form action="" method="post">
      <div class="row" id="saveduedates">
      <div class="col-md-3">
        Due Date
      </div>
      <div class="col-md-6">
        <input type="date" name="duedate" value="" id="duedate" class="form-control">
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-primary" name="btnduedate" onclick="saveduedate(<?php echo $Customer_ID; ?>), hidesavedate();">SAVE</button>
      </div>
    </div>

      <div class="row" id="editduedate">
        <?php
        if((mysqli_num_rows($select_incoice))>0){
          while($Incoice_ID = mysqli_fetch_assoc($select_incoice)){
            $invoiceID= $Incoice_ID['Invoice_ID'];
            $duedate = $Incoice_ID['duedate'];
            ?>
            <div class="col-md-3">
              Due Date
            </div>
            <div class="col-md-5">
              <input type="date" name="duedate" value="<?php echo $duedate; ?>" id="duedate" class="form-control">
            </div>
            <div class="col-md-2">
              <span><button type="button" class="btn btn-primary btn-block" name="btnduedate" >Edit Date</button></span>
            </div>
            <div class="col-md-2">
              <span><a href="invoice_generated_pdf.php?Customer_ID=<?= $Customer_ID?>" class="btn btn-primary" target="_blank" id="invoicebtn">  Generate Invoice</a>
              </span>
            </div>
            <?php
        }  }else{
            ?>
            <div class="col-md-3">
              Due Date
            </div>
            <div class="col-md-5">
              <input type="date" name="duedate" value="<?php echo "Due date note set"; ?>" id="duedate" class="form-control">
            </div>
            <div class="col-md-2">
              <span><button type="button" class="btn btn-primary btn-block" name="btnduedate" >Edit Date</button></span>
            </div>
            <div class="col-md-2">
              <span><a href="invoice_generated_pdf.php?Customer_ID=<?= $Customer_ID?>" class="btn btn-primary" target="_blank" id="invoicebtn">  Generate Invoice</a>
              </span>
            </div>
            <?php
          }
    ?>

      </div>
    </form>

  </fieldset>

  <script>
  $(document).ready(function(){
   $("#editduedate").hide();
  });
  function invoice_generated(){
    alert("invoice generated");
    var Customer_ID = $('#selected_customer_id').val();
      $.ajax({
        type:'POST',
        url:'invoice_generated.php',
        data:{Customer_ID:Customer_ID},
        success:function(responce){
        alert("invoice generated");
        window.open('invoice_generated_pdf.php',"_blank");
        }
      });
  }

   function saveduedate(Customer_ID){
       var duedate = $("#duedate").val();
       if(duedate==''){
         $("#duedate").css("border", "2px solid red");
       }else{
         $("#duedate").css("border", "");

       $.ajax({
         type:'POST',
         url:'ajax_preview_invoice.php',
         data:{duedate:duedate,Customer_ID:Customer_ID},
         success:function(responce){
           $("#editduedate").show();

         }
       });
      }
   }
function hidesavedate(){
  var duedate = $("#duedate").val();
  if(duedate==''){
    $("#duedate").css("border", "2px solid red");
  }else{
    $("#duedate").css("border", "");
  $("#saveduedates").hide();
  }
}
  </script>
