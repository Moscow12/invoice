
<?php
    include("connection.php");
      session_start();
          if(isset($_GET['Customer_ID'])){
            $Customer_ID =$_GET['Customer_ID'];
          }else{
            $Customer_ID=0;
          }
          if(isset($_GET['Invoice_ID'])){
            $Invoice_ID = $_GET['Invoice_ID'];
          }else{
            $Invoice_ID=0;
          }
          $session_ID = $_SESSION['User_ID'];
      $customer_name= "";
      $Query_name = mysqli_query($conn, "SELECT  cp.Customer_ID, cp.Product_ID, cp.User_ID,product_description, product_name,cp.quantity,Selling_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps, tbl_cell_product cp WHERE cp.Customer_ID='$Customer_ID' AND cp.Product_ID= ps.Product_ID AND ps.Product_ID=tp.Product_ID AND DATE(cp.created_at) = CURDATE()" ) or die(mysqli_error($conn));
      $select_incoice = mysqli_query($conn, "SELECT Invoice_ID, duedate,Customer_ID FROM tbl_invoice WHERE Customer_ID='$Customer_ID' AND User_ID='$session_ID' AND DATE(created_at)=CURDATE()") or die(mysqli_error($conn));
        while($Incoice = mysqli_fetch_assoc($select_incoice)){
          $Invoice_ID= $Incoice['Invoice_ID'];
          $duedate = $Incoice['duedate'];

        }
        //die("SELECT Invoice_ID, duedate,Customer_ID FROM tbl_invoice WHERE Customer_ID='$Customer_ID' AND User_ID='$session_ID' AND DATE(created_at)=CURDATE()");

        $customer_details = mysqli_query($conn, "SELECT * FROM tbl_customer_registraion where User_ID='$session_ID' AND Customer_ID ='$Customer_ID'") or die(mysqli_error($conn));

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

          $select_user_info = mysqli_query($conn, "SELECT fullname, phone_number, email from user where User_ID='$session_ID'") or die(mysqli_error($conn));
          while ($user = mysqli_fetch_assoc($select_user_info)){
            $name = $user['fullname'];
            $phone = $user['phone_number'];
            $email = $user['email'];
          }
          $select_bank_account = mysqli_query($conn, "SELECT account_type, account_name, Account_number FROM tbl_company_account where User_ID='$session_ID' " ) or die(mysqli_error($conn));
          while($account = mysqli_fetch_assoc($select_bank_account)){
            $account_type = $account['account_type'];
            $account_name = $account['account_name'];
            $Account_number = $account['Account_number'];
          }

          $terms = mysqli_query($conn, "SELECT terms_condition FROM tbl_terms_condition where user_ID='$session_ID'") or die(mysqli_error($conn));
          while($condition = mysqli_fetch_assoc($terms)){
            $terms_condition = $condition['terms_condition'];
          }
          $select_company = mysqli_query($conn, "SELECT companyname, company_email, postaladdress,phonenumber,
            company_region, company_district, company_street, company_block, company_logo, ceo_signature FROM tbl_company_registration where User_ID='$session_ID' " ) or die(mysqli_error($conn));
          while($company = mysqli_fetch_assoc($select_company)){
            $companyname = $company['companyname'];
            $company_email = $company['company_email'];
            $postaladdress = $company['postaladdress'];
            $phonenumber = $company['phonenumber'];
            $company_region = $company['company_region'];
            $company_district = $company['company_district'];
            $company_street = $company['company_street'];
            $company_logo = $company['company_logo'];
            $ceo_signature = $company['ceo_signature'];

          }
          $htm ="
          <style>
            div{
              background-color:#CCEDFF;
              display-content:none;
              border-radius: 5px;
              height:20px;

            }
            #product{
              border-top: 2px solid blue;
              border-left: 2px solid blue;
              border-bottom: 2px solid blue;
              border-right: 2px solid blue;
              border-radius: 5px;
            }
            body {
                overflow:hidden;
                height:100vh;
                background:radial-gradient(circle at 50% 120px, #c6a5f0 0px, #c6a5f0 120px, #b793ec 120px, #b793ec 200px, #ac85e8 200px, #ac85e8 320px, #a379e5 320px, #a379e5, #896ae1 500px, #896ae1 100% );
              }
          </style>
          <table class='table' width='100%'>
            <tr>
              <td style='height: 150px; width:40%; align:left;' ><p style='height: 150px; align:center;' >" .$company_logo."</p><br/><h2>INVOICE</h2></td>
              <td style='height:150px;   width:20%; align:right;' >" .$companyname. "<br/>" .$postaladdress."<br/>" .$company_email.".<br/>" .$name. "|" .$phone. "|" .$email. "</td>
            </tr>
          </table>
          <div id=''>.</div>
          <table width='100%' >
          <tr><td  style='height: 200px;'>
            <table width='100%' align='left' style='border: 2px solid black'>
              <tbody>
              <tr style='align-content:center; background-color:grey;border-radius: 5px;' ><th colspan='2' >INVOICE DETAILS</th></tr>
              <tr>
                <th>INVOICE#</th>
                <td>00" .$Invoice_ID. "</td>
              </tr>
              <tr>
                <th style='text-align:left;'> ACCOUNT TYPE</th>
                <td>" . $account_type ."</td>
              </tr>
              <tr>
                <th style='text-align:left;'> ACCOUNT NAME</th>
                <td>" . $account_name ."</td>
              </tr>
              <tr>
                <th style='text-align:left;'>ACCOUNT NUMBER </th>
                <td>" . $Account_number ."</td>
              </tr>
              <tr>
                <th style='text-align:left;'>INVOICE DATE</th>
                <td style='background-color:#be6511; text-color:;#fdfefe'>" .$duedate. "</td>
              </tr>
              </tbody>
            </table>
            </td>
            <td>TO</td>
            <td style='height: 200px;'>
            <table width='40%' align='center'>
                    <tbody>
                    <tr><th colspan='2'>CUSTOMER DETAILS</th></tr>
                      <tr>
                        <th style='text-align:right;'>Name</th>
                        <td><b>" . $Client_name ."</b></td>
                      </tr>

                      <tr>
                        <th style='text-align:right;'>Location</th>
                        <td>" . $client_region .' '. $client_district . ' '. $client_street .' '. $client_block ."</td>
                      </tr>
                      <tr>
                        <th style='text-align:right;'>Phone Number</th>
                        <td>" . $Clint_PhoneNumber ."</td>
                      </tr>
                      <tr>
                        <th style='text-align:right;'>Email Address</th>
                        <td>" . $client_email ."</td>
                      </tr>
                    </tbody>
                  </table>
                </td>  </tr></table>";

         $htm .="  <table width='100%' id='product' >
                    <thead style='background-color:blue;'>
                      <tr style='background-color:blue;'>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody Style='border-bottom: 2px solid blue;'>";
                    $Total = 0;
                    $VAT = 0;
                    $General = 0;
                    if((mysqli_num_rows($Query_name))>0){
                      $num= 0;
                      while($name = mysqli_fetch_assoc($Query_name)){
                        $product_name = $name['product_name'];
                        $price = $name['Selling_price'];
                        $quantity = $name['quantity'];
                        $product_description = $name['product_description'];
                        $Amount = $price * $quantity;
                        $Total += $Amount;
                        $num++;
                    $htm .= "<tr><td width='5%' align='center'>$num</td><td align='center'>" . $product_name . "<br/>" .$product_description. "</td><td align='center'>" . $price . "</td><td align='center'>" . $quantity . "</td><td align='center'>" . $Amount . "</td></tr>";
                      }

                    }

                    $VAT = $Total * 0.2;
                    $General = $VAT + $Total;
          $htm .= " </tbody>
                    <tfooter >
                      <tr >
                        <th colspan='4' align='left'><h3>TOTAL CASH REQUIRED</h3></th>
                        <th style='background-color:#CCEDFF'>SUB TOTAL " .$Total . "<br/>VAT% &nbsp;&nbsp;".$VAT."<br/><span style=' font-size:18;'>TOTAL &nbsp;&nbsp;".$General."</span> </th>
                      </tr>
                    </tfooter>
                </table>
              </body>";


        $htm .="
            <table class='table' width='100%'>
              <tr>
                <td><b>Terms and Condition</b><br/>".$terms_condition."</td>
                <th>Invoice Duedate</th>
                <td>". $duedate ."</td>
              </tr>
              <tr><td colspan='3' align='center'><b><h4>WELCOME</h4></b></td></tr>
            </table>

        ";
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
