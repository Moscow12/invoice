<?php
include("connection.php");
$Client_name = mysqli_real_escape_string($conn, $_POST['Client_name']);
die("SELECT Customer_ID, Client_name, client_region,client_street FROM tbl_customer_registraion WHERE Client_name %LIKE% '$Client_name'");
$select_names_search = mysqli_query($conn, "SELECT Customer_ID, Client_name, client_region,client_street FROM tbl_customer_registraion WHERE Client_name %LIKE% '$Client_name'" );

if((mysqli_num_rows($select_names_search))>0){
  $Num = 1;
  while ($names = mysqli_fetch_assoc($select_names_search)) {
    $Customer_ID = $names['Customer_ID'];
    $customer_name = $names['Client_name'];
    $region = $names['client_region'];
    $street = $names['client_street'];

    echo "<tr class='row_list' onclick='display_selected_customer($Customer_ID)'>
            <td>$Num;</td>
                <td>$customer_name;</td>
                <td>$region ' '$street;</td>
          </tr>"
          $Num++;

  }
}else{
  echo "<tr>
            <td>No result found</td>
        </tr>";
}
