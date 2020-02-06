<?php
include("connection.php");
session_start();
  $session_ID = $_SESSION['User_ID'];
if(isset($_POST['filterbtn'])){
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $filter_result= mysqli_query($conn, "SELECT cp.Quantity, ps.Product_ID, buying_price, Selling_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps, tbl_cell_product cp where ps.Product_ID=cp.Product_ID AND tp.Product_ID=cp.Product_ID AND DATE(cp.created_at) BETWEEN '$start_date' AND '$end_date'") or die(mysqli_error($conn));
      $Total=0;
      $profit=0;
      $Total_buying=0;
      $num=1;
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

        echo "<tr><td>".$num++."</td>";
        echo "<td>".$product_name."</td>";
        echo "<td>".number_format($price)."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".number_format($amount)."</td></tr>";

      }
    }
    $profit = $Total - $Total_buying;
    echo "<tr><td colspan='4' align='center'><b>Total Sales</b></td><td><b>".number_format($Total)."</b></td></tr>";
    echo "<tr><td colspan='4' align='center'><b>Total Profit</b></td><td><b>".number_format($profit)."</b></td></tr>";
    echo "<tr><td><a class='btn btn-info' href='print_sales_record.php?Start_Date=$start_date&&End_Date=$end_date' target='_blank'><i class='fa fa-print'></i><span>PRINT</span></a></td></tr>";
}
?>
