<?php
    include("connection.php");
      session_start();
      $htm= "fjdhjfhdjfhdf";
  if(isset($_GET['Customer_ID'])){
     $Customer_ID=$_GET['Customer_ID'];
       $session_ID = $_SESSION['User_ID'];

    $htm .="<table class='table'>
            <thead><tr><td>#</td><td>PRODUCT NAME</td><td>PRODUCT PRICE</td></tr></thead>";

      $sql_select_attached_category_result=mysqli_query($conn,"SELECT tpi.Customer_ID,  tpi.Product_ID,  buying_price,product_name,product_unit FROM tbl_proformer_invoice tpi, tbl_product tp, tbl_product_store ps where tpi.User_ID='$session_ID' AND ps.Product_ID=tp.Product_ID AND tp.Product_ID=tpi.Product_ID AND tpi.Customer_ID='$Customer_ID'AND DATE(tpi.created_at)=CURDATE()") or die(mysqli_error($conn));
        if((mysqli_num_rows($sql_select_attached_category_result))>0){
           $count=1;
           while($category_rows=mysqli_fetch_assoc($sql_select_attached_category_result)){
             $Product_ID=$category_rows['Product_ID'];
             $Product_Name=$category_rows['product_name'];
             $price = $category_rows['buying_price'];
             $unit =$category_rows['product_unit'];
             $htm .="<tr>
                         <td style='width:50px'>
                             $count
                         </td>
                         <td>
                             $Product_Name($unit)
                         </td>
                         <td>".number_format($price)."</td>

                   </tr>";
             $count++;
           }
       }

    $htm="</table>";

      }

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
