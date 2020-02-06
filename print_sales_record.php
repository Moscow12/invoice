<?php
    include("connection.php");
      session_start();

      if(isset($_GET['Start_Date'])){
        $Start_Date = $_GET['Start_Date'];
      }else{
        $Start_Date='00-00';
      }
      if(isset($_GET['End_Date'])){
        $End_Date = $_GET['End_Date'];
      }else{
        $End_Date='00-00';
      }

      $filter_result= mysqli_query($conn, "SELECT cp.Quantity, ps.Product_ID, buying_price, Selling_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps, tbl_cell_product cp where ps.Product_ID=cp.Product_ID AND tp.Product_ID=cp.Product_ID AND DATE(cp.created_at) BETWEEN '$Start_Date' AND '$End_Date'") or die(mysqli_error($conn));
        $Total=0;
        $profit=0;
        $Total_buying=0;
        $num=1;
        $htm ="<h3 align='center'>SALES REPORT</h3><br><h4 align='center'>Since $Start_Date To $End_Date </h4>";
        $htm .="<table width='100%' Style='border:1px;'>
              <tr>
                <td>#</td>
                <td>Item Name $Start_Date</td>
                <td>Price $End_Date</td>
                <td>Quantity</td>
                <td>Amount</td>
              <tr>

              ";
      if((mysqli_num_rows($filter_result))>0){
        while($result= mysqli_fetch_assoc($filter_result)){
          $product_name = $result['product_name'];
          $price = $result['buying_price'];
          $quantity = $result['Quantity'];
          $buying_price = $result['Selling_price'];
          $amount = $price * $quantity;
          $buying_amount = $buying_price * $quantity;
          $Total += $amount;
          $Total_buying +=$buying_amount;

          $htm .="<tr><td>".$num++."</td>
                   <td>$product_name</td>
                   <td>".number_format($price)."</td>
                   <td>$quantity</td>
                   <td>".number_format($amount)."</td></tr>";

        }
      }
      $profit = $Total - $Total_buying;
      $htm .= "<tr><td colspan='4' align='center'><b>Total Sales</b></td><td><b>".number_format($Total)."</b></td></tr>
              <tr><td colspan='4' align='center'><b>Total Profit</b></td><td><b>".number_format($profit)."</b></td></tr></table>";

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
