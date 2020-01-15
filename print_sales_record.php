<?php
    include("connection.php");
      session_start();

      if(isset($_POST['start_date'])){
        $start_date = $_POST['start_date'];
      }else{
        $start_date='00-00';
      }
      if(isset($_POST['end_date'])){
        $end_date = $_POST['end_date'];
      }else{
        $end_date='00-00';
      }

      $filter_result= mysqli_query($conn, "SELECT cp.Quantity, ps.Product_ID, buying_price, Selling_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps, tbl_cell_product cp where ps.Product_ID=cp.Product_ID AND tp.Product_ID=cp.Product_ID AND DATE(cp.created_at) BETWEEN '$start_date' AND '$end_date'") or die(mysqli_error($conn));
        $Total=0;
        $profit=0;
        $Total_buying=0;
        $num=1;
        $htm ="<h3 align='center'>SALES REPORT</h3><br><h4 align='center'>Since $start_date To $end_date </h4>";
        $htm .="<table width='100%' Style='border:1px;'>
              <tr>
                <td>#</td>
                <td>Item Name</td>
                <td>Price</td>
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
                   <td>$price</td>
                   <td>$quantity</td>
                   <td>$amount</td></tr>";

        }
      }
      $profit = $Total - $Total_buying;
      $htm .= "<tr><td colspan='4' align='center'><b>Total Sales</b></td><td><b>$Total</b></td></tr>
              <tr><td colspan='4' align='center'><b>Total Profit</b></td><td><b>$profit</b></td></tr></table>";

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
