
<?php
    include("connection.php");
      session_start();
          if(isset($_GET['Customer_ID'])){
            $Customer_ID =$_GET['Customer_ID'];
          }else{
            $Customer_ID="0";
          }
          $session_ID = $_SESSION['User_ID'];
      $customer_name= "";
      //die("SELECT * FROM tbl_customer_registraion where User_ID='$session_ID' AND Customer_ID = '$Customer_ID'");
      $Query_name = mysqli_query($conn, "SELECT  cp.Customer_ID, cp.Product_ID, cp.User_ID,product_name,product_price,quantity FROM  tbl_cell_product cp, tbl_product p WHERE cp.Customer_ID='$Customer_ID' AND cp.Product_ID=p.Product_ID AND DATE(created_at)=CURDATE()" ) or die(mysqli_error($conn));

        $customer_details = mysqli_query($conn, "SELECT * FROM tbl_customer_registraion where User_ID='$session_ID' AND Customer_ID = '$Customer_ID'") or die(mysqli_error($conn));

          if((mysqli_num_rows($customer_details))>0){
            while($details = mysqli_fetch_assoc($customer_details)){
              $Client_name = $details['Client_name'];
              $Clint_PhoneNumber = $details['Clint_PhoneNumber'];
              $client_email = $details['client_email'];
              $client_region = $details['client_region'];
              $client_district = $details['client_district'];
              $client_street = $details['client_street'];
              $client_block = $details['client_block'];
            }
          }
          $htm ="<table width='50%' align='center'>
                    <tbody>
                      <tr>
                        <th>Customer Name</th>
                        <td>" . $Client_name ."</td>
                      </tr>
                      <tr>
                        <th>Customer Phone Number</th>
                        <td>" . $Clint_PhoneNumber ."</td>
                      </tr>
                      <tr>
                        <th>Email Address</th>
                        <td>" . $client_email ."</td>
                      </tr>
                      <tr>
                        <th>Customer Name</th>
                        <td>" . $Clint_PhoneNumber ."</td>
                      </tr>
                      <tr>
                        <th>Location</th>
                        <td>" . $client_region .' '. $client_district . ' '. $client_street .' '. $client_block ."</td>
                      </tr>
                    </tbody>
                  </table>";

        $htm .="<p>Right moment</p><br><body style='background-color:grey; color:white; border:1px solid;text-align: right;'>
                <table width='100%' >
                    <thead style='background-color:blue;'>
                      <tr style='background-color:blue;'>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $Total = "0";
                    if((mysqli_num_rows($Query_name))>0){
                      $num= 0;
                      while($name = mysqli_fetch_assoc($Query_name)){
                        $product_name = $name['product_name'];
                        $product_price=$name['product_price'];
                        $quantity = $name['quantity'];
                        $Amount = $product_price * $quantity;

                        $num++;
                    $htm .= "<tr><td>$num</td><td align='center'>" . $product_name . "</td><td align='center'>" . $product_price . "</td><td align='center'>" . $quantity . "</td><td align='center'>" . $Amount . "</td></tr>";
                      }

                    }
                    $Total += $Amount;
          $htm .= " </tbody>
                    <tfooter>
                      <tr>
                        <th >TOTAL CASH REQUIRED</th><th><th><th>
                        <th>" .$Total . "</th>
                      </tr>
                    </tfooter>
                </table>
              </body>";

        ?>


        <?php
        include("./MPDF/mpdf.php");

        $mpdf = new mPDF('', 'A4-L', 0, '', 12.7, 12.7, 14, 12.7, 8, 8);
      //  $mpdf = new mPDF('s', 'Letter');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('|{PAGENO}|{DATE d-m-Y}');
        $mpdf->WriteHTML($htm);
        $mpdf->Output();
        exit;
        ?>
