<?php
include("connection.php");
include("header.php");
include("session.php");
if(!isset($_SESSION['User_ID'])){
  session_destroy();
  header("Location:index.php");
}
?>

<style>

   .example-modal .modal {
     position: relative;
     top: auto;
     bottom: auto;
     right: auto;
     left: auto;
     display: block;
     z-index: 1;
   }

   .example-modal .modal {
     background: transparent !important;
   }
   .tab {
     overflow: hidden;
     border: 1px solid #ccc;
     background-color: #f1f1f1;
   }

   /* Style the buttons inside the tab */
   .tab button {
     background-color: inherit;
     float: left;
     border: none;
     outline: none;
     cursor: pointer;
     padding: 14px 16px;
     transition: 0.3s;
     font-size: 80%;
   }

   /* Change background color of buttons on hover */
   .tab button:hover {
     background-color: #ddd;
   }

   /* Create an active/current tablink class */
   .tab button.active {
     background-color: #ccc;
   }

   /* Style the tab content */
   .tabcontent {
     display: none;
     padding: 6px 12px;
     border: 1px solid #ccc;
     border-top: none;
   }
   fieldset{
     border: 1px solid #ccc;
   }
   #attach_cat_icon{
       transform: rotate(45deg);
   }
 </style>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>GN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Invoice</b>GN</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- /.messages-menu -->

          <!-- Notifications Menu -->

          <!-- Tasks Menu -->

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $session_username; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $session_fullname; ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left tab">
                  <button class="tablinks btn btn-default btn-flat" onclick="openform(event, 'updateProfile')">Profie</button>
                  <button class="tablinks" onclick="openform(event, 'upload')">Profile Photo</button>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" class="dropdown"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar control-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"  >

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $session_username; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> <i class="fa fa-gears"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SETTINGS </li>
        <!-- Optionally, you can add icons to the links -->
        <li ><button class="tablinks btn-block"  onclick="openform(event, 'adduser_form')"><i class="fa fa-plus"></i><span>&nbsp;&nbsp;&nbsp;&nbsp; REGISTER SYSTEM USER</span></button></li>
        <li> <button class="tablinks  btn-block" onclick="openform(event, 'show_company_register')"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>REGISTER COMPANY</span></button></li>
        <li> <button class="tablinks btn-block" onclick="openform(event, 'company_account_form')"><i class="fa fa fa-fw fa-bank"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>COMPANY ACCOUNT</span></button></li>
        <li class="treeview">
        <a href="#" class="btn btn-primary btn-block"><i class="fa fa-link"></i> <span>COSTOMER FORMS</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li> <button class="tablinks btn-block" onclick="openform(event, 'Quotation_form')">QUOTATION</button></li>
          <li> <button class="tablinks btn-block" onclick="openform(event, 'local_purchase_form'), lpo()"><i class="fa fa fa-fw fa-bank"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>LOCAL PURCHASE ORDER</span></button></li>
          <li> <button  class="tablinks btn-block" onclick="openform(event, 'profomer_form')"><i class="fa fa fa-fw fa-bank"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>PROFORMER INVOICE</span></button></li>
          <li><button class="btn btn-info"  onclick="company_logo_dialog()" >Edit User</button> </li>
        </ul>
      </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="tab col-xs-12 col-sm-12 col-md-12">
          <button class="tablinks" onclick="openform(event, 'Product')">PPODUCT</button>
          <button class="tablinks" id='Client_tab'onclick="openform(event, 'Client')">CLIENT</button>
          <button class="tablinks" id='cellproduct_tab' onclick="openform(event, 'cellproduct')">SALE PRODUCT</button>
          <button class="tablinks" onclick="openform(event, 'invoicetoday')">INVOICE</button>

        </div>
        <?php
            $customers_list = mysqli_query($conn, "SELECT Customer_ID,client_region,client_street, Client_name FROM tbl_customer_registraion where User_ID='$session_ID'") or die(mysqli_error($conn));
        ?>
        <div class="tabcontent" id="Quotation_form">
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
        </div>
        <div class="tabcontent" id="profomer_form">
            <h3><center>PROFORMER INVOICE </center></h3>
          <div class="rows">
            <fieldset>
              <div class="rows">
                <div class="col-md-6">
                  <input type="text"style="text-align: center"class="form-control"id="all_item_search_box" onkeyup="search_item_from_all_list()" placeholder="----------------Search Item~~~-------------"/>
                  <br/>
                  <div class="box box-primary" style="height: 400px;overflow: auto">
                      <div class="box-header">
                          <div class="col-sm-8"> <h4 class="box-title">List of All Item</h4></div>
                          <div class="col-sm-4">
                              <a href="#" class="btn btn-default pull-right" onclick="attach_Item_to_costomer_proformer()"><i id="attach_cat_icon" style="color:#328CAF" class="fa fa-send fa-2x"></i></a>
                          </div>
                      </div>
                      <div class="box-body" >
                          <!-- <label><input type="checkbox" id="select_all_checkbox"> Select All</label> -->
                          <table class="table">

                          </table>
                          <div id="">
                              <table class="table">
                                <tr>
                                  <td>  <label><input type="checkbox" id="select_all_checkbox"> Select All</label></td>
                                  <td>Item Name</td>
                                  <td>Item Price</td>
                                  <td>Item Balance</td>
                                </tr>
                                <tbody id="all_item_list_body">
                              <?php
                                  $sql_select_item_result=mysqli_query($conn,"SELECT Quantity,ps.Product_ID,Selling_price,buying_price,product_name,product_unit FROM tbl_product tp, tbl_product_store ps WHERE   ps.Product_ID=tp.Product_ID limit 50") or die(mysqli_error($conn));
                                  if(mysqli_num_rows($sql_select_item_result)>0){
                                      while($category_rows=mysqli_fetch_assoc($sql_select_item_result)){
                                        $Product_ID = $category_rows['Product_ID'];
                                        $item = $category_rows['product_name'];
                                        $price = $category_rows['Selling_price'];
                                        $unit = $category_rows['product_unit'];
                                        $balance = $category_rows['Quantity'];
                                          echo "<tr>
                                                      <td>
                                                          <label style='font-weight:normal'>
                                                              <input type='checkbox'class='Product_ID' name='Product_ID' value='$Product_ID'>
                                                          </label>
                                                      </td>
                                                      <td>$item ($unit)</td>
                                                      <td>$price</td>
                                                      <td>$balance</td>
                                                </tr>";
                                      }
                                  }
                              ?></tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                      <div class="col-sm-5">
                          <label>SELECT CUSTOMER</label>
                      </div>
                      <div class="col-sm-7">
                          <select class="form-control" id="Customer_ID_P" onchange="refresh_content()">
                            <option value="">~~~customer~~~</option>
                              <?php
                                  $select_customers_result=mysqli_query($conn,"SELECT Customer_ID, Client_name FROM tbl_customer_registraion WHERE  enabled_disabled='enabled'") or die(mysqli_error($conn));
                                  if(mysqli_num_rows($select_customers_result)>0){
                                      while($costomersd=mysqli_fetch_assoc($select_customers_result)){
                                         $Client_name=$costomersd['Client_name'];
                                         $Customer_ID=$costomersd['Customer_ID'];
                                         echo "<option value='$Customer_ID'>$Client_name</option>";
                                      }
                                  }
                              ?>
                          </select>

                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <br/>
                        <div class="box box-primary" style="height: 400px;overflow: auto">
                            <div class="box-header">
                                <input id="Customer_ID" style="display:none" value="<?php echo $Customer_ID;?>">
                                <div class="col-sm-12"><p id="category_list_tittle" style="font-size:17px">Item attached to </p></div>
                                <div class="col-sm-6" style="display:none">
                                    <input type="text" style="text-align:center" class="form-control" id="attached_category_search_box" placeholder="--------Search--------" />
                                </div>
                            </div>
                            <div class="box-body" id="attached_item_body">

                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
        <div class="tabcontent" id="invoicetoday">
          <h3><center>INVOIVE GENERATED TODAY </center></h3>
          <table class="table" width="100%">
            <tr>
                <th>#</th>
                <th>Custome name</th>
                <th>Invoice Duedate</th>
                <th>Action</th>
            </tr>
          <?php
              $select_incoice = mysqli_query($conn, "SELECT Invoice_ID, Client_name, duedate, i.Customer_ID FROM tbl_customer_registraion cr, tbl_invoice i WHERE i.Customer_ID=cr.Customer_ID AND i.User_ID='$session_ID' AND DATE(created_at)=CURDATE() ORDER BY Invoice_ID DESC") or die(mysqli_error($conn));
              $nams = 0;
              if((mysqli_num_rows($select_incoice))>0){
                while($Incoice = mysqli_fetch_assoc($select_incoice)){
                  $Invoice_ID= $Incoice['Invoice_ID'];
                  $duedate = $Incoice['duedate'];
                  $customers = $Incoice['Client_name'];
                  $Customer_ID = $Incoice['Customer_ID'];
                  $nams++;
                  ?>

                    <tr>
                      <td><?php echo $nams; ?></td>
                      <td><?php echo $customers; ?></td>
                      <td><?php echo $duedate; ?></td>
                      <td><a href="invoice_generated_pdf.php?Customer_ID=<?=$Customer_ID?>&Invoice_ID=<?=$Invoice_ID?>" class="btn btn-info" target="_blank">Print invoice</a> </td>
                    </tr>

                  <?php
                 }
              }else{
                echo "No invoice generated today";
              }
                ?>
            </table>
            <hr>
            <table class="table table-responsive">
              <?php
              $sql_date_time = mysqli_query($conn,"select now() as Date_Time ") or die(mysqli_error($conn));
                  while($date = mysqli_fetch_array($sql_date_time)){
                      $Current_Date_Time = $date['Date_Time'];
                  }
                  $Filter_Value = substr($Current_Date_Time,0,11);
                  $Start_Date = $Filter_Value.'00:00';
                  $End_Date = $Current_Date_Time;

              ?>
              <tr>
                <td colspan="4"><center> FILTER SALES REPORT</center></td>
              </tr>
              <tr>
                <td><input type="date" name="" value="<?= $Start_Date ?>"  id="start_date"></td>
                <td><input type="date" name="" value="<?= $End_Date ?>"  id="end_date" ></td>
                <td><input type="button" name="filterbtn" class="btn btn-primary" value="FILTER" onclick="filtersalesreport()"></td>
                <td><a href="print_sales_record.php?start_date=<?= $Start_date ?>&&End_date=<?= $End_Date?>" class="btn btn-info" target="_blank">PRINT RECORD</a> </td>
              </tr>
              <tr>
                <th>SN</th>
                <th>PRODUCT NAME</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>AMOUNT</th>
              </tr>
              <tbody id="sales_record">
                <tr>
                  <td colspan="4" id='class_loader'></td>
                </tr>
              </tbody>
            </table>
        </div>
        <div id="upload" class="tabcontent">
          <h3><center>Upload Profile image </center></h3>
          <form action="productDB.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label">Upload image</label>
                <div class="col-sm-8">
                  <input type="file" class="form-control" id="" name="user_photo" >
                </div>
          </div>
          <button type="submit" class="btn btn-info" name="upload">Upload Image</button>
          </form>
        </div>
        <div class="tabcontent" id="updateProfile">
          <center>
          <li class="user-header">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
              <?php echo $session_fullname; ?> - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>
        </center>
            <h3><center>Update Profile</center></h3>
          <p>
            <form action="productDB.php" method="post">
              <div class="form-group row">
                  <label class="col-sm-2 col-md-2 col-form-label">Full Name</label>
                  <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="" value="<?php echo $session_fullname; ?>" placeholder="Full Name" name="fullname">
                  </div>
                  <label class="col-sm-2 col-md-2 col-form-label">Username</label>
                  <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="" placeholder="Username" value="<?php echo $session_username;?>" name="user_name">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-md-2 col-form-label">Email</label>
                  <div class="col-sm-4 col-md-4">
                      <input type="email" class="form-control" id="" placeholder="Email address" name="email" value="<?php echo $session_email; ?>">
                  </div>
                  <label class="col-sm-2 col-md-2 col-form-label">Phone Number</label>
                  <div class="col-sm-4 col-md-4">
                      <input class="form-control" id="" placeholder="Phone number" value="<?php echo $phonenumber; ?>" name="phone_number"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-md-2 col-form-label">Password</label>
                  <div class="col-sm-3 col-md-4">
                      <input type="text" class="form-control" id="password" placeholder="Password"  name="password">
                  </div>
                  <label class="col-sm-2 col-md-2 col-form-label">Confirm Password</label>
                  <div class="col-sm-3 col-md-4 ">
                      <input type="text" class="form-control" id="confirmpassword" placeholder="Confirm Password" >
                  </div>
            </div>
              <button type="submit" name="profile" class="btn btn-info">UPDATE PROFILE</button>
            </form>
          </p>
        </div>
        <div id="Product" class="tabcontent">
          <center><center style="align-content:right;"><button class="tablinks btn btn-info" onclick="openform(event, 'Add_new_product')" name="button">ADD NEW PRODUCT</button></center>



          </p>
          <div class=" col-sm-12 col-md-12 row">
            <form class="" action="" method="post">
              <table class='table table-responsive' style='background:#FDFFEF'>
                  <caption><b><center>STORE NEW PRODUCT TO STOCK</center></b></caption>
                <tbody>
                  <tr>
                    <th>Product Name</th>
                    <th>Buying Price</th>
                    <th>Selling Product</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td>
                    <select name="Product_ID" class="form-control" id="Product_ID">
                        <option value="">~~select Item~~</option>
                    <?php
                      $select_product = mysqli_query($conn, "SELECT product_name, Product_ID, product_unit FROM tbl_product ORDER BY(product_name) ASC") or die(mysqli_error($conn));
                        if((mysqli_num_rows($select_product))>0){
                          while($product_result = mysqli_fetch_assoc($select_product)){
                            $product_name = $product_result['product_name'];
                            $Product_ID = $product_result['Product_ID'];
                            $unit =$product_result['product_unit'];
                            echo "<option td value='$Product_ID' >$product_name ($unit)</option>";
                          }
                        }else{
                          echo "<td>NO product found add One.</td>";
                        }
                    ?>
                    </select>
                  </td>
                  <td><input type="text" name="Selling_price" value="" id="Selling_price"> </td>
                  <td><input type="text" name="buying_price" value="" id="buying_price"> </td>
                  <td><input type="text" name="Quantity" value="" id="Quantity"> </td>
                  <td><button type="button" name="stock" class="btn btn-primary btn-block" onclick="stock_product()">STORE</button> </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
          <div class="container row" style='margin-right:10px;'>
            <form action="" method="get">
            <table class="table table-responsive" style='background:#FAFFEF;'>
              <caption><b><center>PRODUCT IN STOCK</center></b></caption>
              <tr>
                <th>SN</th>
                <th>PRODUCT NAME</th>
                <th>BUYING PRICE</th>
                <th>SELLING PRICE</th>
                <th>QUANTITY IN STORE</th>
              </tr>
              <tbody id="product_in_store">

              </tbody>
            </table>
          </form>
          </div>
        </div>

        <div class="tabcontent" id="Add_new_product">
          <h3><center>REGISTER PRODUCT </center></h3>
          <p>
            <form action="productDB.php" method="post">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Product name</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="" name="product_name" placeholder="Account name">
                    </div>
                    <!-- <label for="" class="col-sm-2 col-form-label">Product Unit</label> -->
                    <div class="col-sm-2" class="form-control">
                        <select name="product_unit" >
                            <option value="">~Product Unit~</option>
                            <option value="Kg">Kilogram</option>
                            <option value="m">meter</option>
                            <option value="bucket">Bucket</option>
                            <option value="pc">PC(s)</option>
                            <option value="bug">Bug(s)</option>
                            <option value="Package">Package</option>
                            <option value="litre">Litre</option>
                        </select>
                    </div>

                    <label for="" class="col-sm-2 col-form-label">Product Description</label>
                    <div class="col-sm-3">
                        <textarea class="form-control" name="product_description" rows="1"></textarea>
                    </div>
                    <div class="col-md-1">
                      <button type="submit"  class="btn btn-info" name="productitem">Submit</button>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Product Price</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="" placeholder="Product Price" name="product_price">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">Product Unit</label>
                    <div class="col-sm-2" class="form-control">
                        <select name="product_unit" >
                            <option value="">~~select unit~~</option>
                            <option value="Kg">Kilogram</option>
                            <option value="m">meter</option>
                            <option value="bucket">Bucket</option>
                            <option value="pc">PC(s)</option>
                            <option value="bug">Bug(s)</option>
                            <option value="Package">Package</option>
                            <option value="litre">Litre</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                      <button type="submit"  class="btn btn-info" name="productitem">Submit</button>
                    </div>
                </div> -->

            </form>
        </div>
        <div id="Client" class="tabcontent">
          <center><h3></h3></center> <center style="align-content:right;"><button class="tablinks btn btn-info" onclick="openform(event, 'Add_new_CLient')" name="button">ADD NEW </button></center>

          <div class="col-md-12" style='height:400px;overflow-y:scroll'>
              <table class='table' style='background:#FFFFFF'>
                  <caption><b><center>LIST OF REGISTERED CUSTOMER</center></b></caption>
                  <tr>
                      <th>S/No.</th>
                      <th>CUSTOMER NAME</th>
                      <th>LOCATION</th>
                      <th>ACTION</th>
                  </tr>
                  <tbody id='list_of_all_customer'>
                    <?php
                        $customer_list = mysqli_query($conn, "SELECT Customer_ID,client_region,client_street, Client_name FROM tbl_customer_registraion where User_ID='$session_ID'") or die(mysqli_error($conn));
                    ?>
                    <?php
                    if((mysqli_num_rows($customer_list))){
                      $num=0;
                      while($row = mysqli_fetch_assoc($customer_list)){
                        $Customer_ID = $row['Customer_ID'];
                        $customer_name = $row['Client_name'];
                        $region = $row['client_region'];
                        $street = $row['client_street'];
                        $num++;
                        ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><input hidden value="<?php echo $Customer_ID; ?>"><?php echo $customer_name; ?></td>
                            <td><?php echo $region .'('.$street.')'; ?></td>
                            <td><input value="SALE PRODUCT" type="button" onclick="capture_customer_id(<?php echo $Customer_ID;?>)"  id="cell_product">
                            </td>
                        </tr>
                        <?php
                       }
                     }else{
                       echo "<tr><td colspan='3'> NO ANY CUSTOMER FOUND ADD NEW IN BUTTON ABOVE</td></tr>";
                     }
                         ?>
                  </tbody>
              </table>
          </div>
        </div>
          <div id="Add_new_CLient" class="tabcontent">
          <h3><center>REGISTER CUSTOMER </center></h3>

          <p>  <hr>
              <form action="productDB.php" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-md-2 col-form-label">Client name</label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" class="form-control" id="" placeholder="Client Name" name="Client_name">
                    </div>
                    <label class="col-sm-2 col-md-2 col-form-label">Client PhoneNumber</label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" class="form-control" id="" placeholder="Client Name" name="Clint_PhoneNumber">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-md-2 col-form-label">Email</label>
                    <div class="col-sm-4 col-md-4">
                        <input type="email" class="form-control" id="" placeholder="Email address" name="client_email">
                    </div>
                    <label class="col-sm-2 col-md-2 col-form-label">Postal Address</label>
                    <div class="col-sm-4 col-md-4">
                        <textarea class="form-control" id="" rows="1"name="postaladdress"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-md-2 col-form-label">Location</label>
                    <div class="col-sm-3 col-md-3">
                        <input type="text" class="form-control" id="" placeholder="Region" name="client_region">
                    </div>
                    <div class="col-sm-3 col-md-3 ">
                        <input type="text" class="form-control" id="" placeholder="District" name="client_district">
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <input class="form-control" id="" name="client_street" placeholder="Street">
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <input class="form-control" id="" name="client_block" placeholder="Block no.">
                    </div>

                </div>
                <button type="submit" name="client_details" class="btn btn-info">SAVE</button>
              </form>
          </p>
        </div>
        <div id="cellproduct" class="tabcontent">

          <center><h3>SALE PRODUCT TO CUSTOMER</h3></center>

          <div id="div_to_cell_product">

          </div>

        </div>
        <div id="cellproduct" class="tabcontent">


          <?php

            $product_list = mysqli_query($conn, "SELECT * FROM tbl_product where User_ID='$session_ID'");
           ?>
          <p>

        </p>
        </div>
        <div class="tabcontent" id="preview_invoice_div">

        </div>

        <div class="tabcontent" id="show_company_register">

          <div class="col-md-10 col-md-offset-2">
          <div class="box">
              <div class="box-header">REGISTER COMPANY IN A SYSTEM</div>
              <div class="box-body">
                  <form action="setting_db.php" method="post">
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Company Name</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="" name="companyname" placeholder="Full Name">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="" name="company_email" placeholder="Email">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Postal Address</label>
                          <div class="col-sm-9">
                              <textarea  class="form-control" id="" name="postaladdress" rows="2" ></textarea>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Phone Number</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="" placeholder="Phone Number" name="phonenumber">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-md-3 col-form-label">Location</label>
                          <div class="col-sm-2 col-md-2">
                              <input type="text" class="form-control" id="" placeholder="Region" name="company_region">
                          </div>
                          <div class="col-sm-3 col-md-3 ">
                              <input type="text" class="form-control" id="" placeholder="District" name="company_district">
                          </div>
                          <div class="col-sm-2 col-md-2">
                              <input class="form-control" id="" name="company_street" placeholder="Street">
                          </div>
                          <div class="col-sm-2 col-md-2">
                              <input class="form-control" id="" name="company_block" placeholder="Block no.">
                          </div>

                      </div>
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Company Logo</label>
                          <div class="col-sm-9">
                              <input type="file" class="form-control" id=""  name="company_logo">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Signature</label>
                          <div class="col-sm-9">
                              <input type="file" class="form-control" id=""  name="ceo_signature">
                          </div>
                      </div>

                       <button type="submit"  class="btn btn-info" name="company_details">Submit</button>
                  </form>
              </div>
            </div>
          </div>

          </div>
          <div id="company_account_form" class="tabcontent">

            <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header">REGISTER COMPANY ACCOUNT</div>
                <div class="box-body">
                    <form action="setting_db.php" method="post">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Account type</label>
                            <div class="col-sm-9">
                                <select name="account_type">
                                  <option value="">~~select type~~</option>
                                  <option value="Bank">Banks</option>
                                  <option value="Mobile_money">Mobile Transaction</option>
                                  <option value="Paypal"> PAYPAL</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Account name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" name="account_name" placeholder="Account name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Account Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="Account Number" name="Account_number">
                            </div>
                        </div>
                        <button type="submit"  class="btn btn-info" name="company_account">Submit</button>
                    </form>
                </div>
              </div>
            </div>

          </div>

          <div id="adduser_form" class="tabcontent">
                <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="box">
                          <div class="box-header center"><center>REGISTER USER</center></div>
                          <div class="box-body">
                              <form action="setting_db.php" method="post">
                                <input name="password" value="1234" hidden>
                                  <div class="form-group row">
                                      <label for="" class="col-sm-3 col-form-label">Full Name</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="" name="fullname" placeholder="Full Name">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="" class="col-sm-3 col-form-label">Email</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="" name="email" placeholder="Email">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="" class="col-sm-3 col-form-label">User name</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="" name="user_name" placeholder="User name">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="" class="col-sm-3 col-form-label">Phone Number</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="" placeholder="Phone Number" name="phone_number">
                                      </div>
                                  </div>

                                   <button name="add_user" type="submit" id="login" class="btn btn-info pull-right">SAVE</a>
                              </form>
                          </div>
                          <div class="col-md-2"></div>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div id="edit_user">
  </div>
  <!-- Main Footer -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li class="active"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->

      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"> <center> SETTINGS</center></li>
          <!-- Optionally, you can add icons to the links -->
          <li><a id="adduser"><i class="fa fa-user"></i> <span>ADD USER</span></a></li>
          <li><a href="#" id="company_account"><i class="fa fa fa-fw fa-bank"></i> <span>Company Account</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>Compan Info</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Company Burner</a></li>
              <li><a href="#"  id="company_details">Company Details</a></li>

            </ul>
          </li>
          <li><a href="#" data-toggle="modal" data-target="#modal-default">Set terms and condition</a> </li>
        </ul>
      </div>
      <!-- /.tab-pane  -->
    </div>

  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<div class="modal fade" id="modal-default">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Set company terms and Condition </h4>
             </div>
             <div class="modal-body">

               <form action="setting_db.php" method="post">
                 <div class="form-group row">
                     <label for="" class="col-sm-3 col-form-label">Terms and condition</label>
                     <div class="col-sm-9">
                         <textarea  class="form-control" id="" name="terms_condition" rows="2" ></textarea>
                     </div>
                 </div><button type="button" class="btn btn-primary pull-right"  data-dismiss="modal" name="terms">Save</button>
                 </form>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
             </div>

           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>


       <!-- /.modal -->
<!-- REQUIRED JS SCRIPTS -->
<?php include("footer.php"); ?>
<script>
  $(document).ready(function(){
    product_instock();

    $('select').select2();
  });
    function search_item_from_all_list(){
      var all_item_search_box = $("#all_item_search_box").val();
      $.ajax({
        type:'post',
        url:'ajax_profomer_invoice.php',
        data:{all_item_search_box:all_item_search_box},
        success:function(responce){
          $("#all_item_list_body").html(responce);
        }
      });
    }
    function attach_Item_to_costomer_proformer(){
       var selectedCategory = [];
          $(".Product_ID:checked").each(function() {
              selectedCategory.push($(this).val());
            });
       var Customer_ID=$("#Customer_ID_P").val()
       if(Customer_ID==""){
         $("#Customer_ID_P").css("border","2px solid red");
         alert("Select Customer To attach Selected Item(s)");
         exit;
       }else{
         $("#Customer_ID_P").css("border","");
       }
       $.ajax({
           type:'POST',
           url:'ajax_attach_Item_to_costomer_proformer.php',
           data:{selectedCategory:selectedCategory,Customer_ID:Customer_ID},
           success:function(data){
               $("#attached_item_body").html(data);
               refresh_content()
           }
       });
      //refresh_content()
    }

    function refresh_content(){
        var Customer_ID=$("#Customer_ID_P").val();
        $("#select_all_checkbox").prop("checked",false)

        var sel = document.getElementById("Customer_ID_P");
        var Client_name= sel.options[sel.selectedIndex].text;

        $("#category_list_tittle").html("List of Item attached to <b>"+Client_name+"</b>")
        $.ajax({
            type:'POST',
            url:'refresh_item_selected_to_customer.php',
            data:{Customer_ID:Customer_ID},
            success:function(data){
              $("#attached_item_body").html(data);
            }
        });
        $.ajax({
            type:'POST',
            url:'Ajax_refresh_all_item_list.php',
            data:{Customer_ID:Customer_ID},
            success:function(data){
                 $("#all_item_list_body").html(data);
            }
        });
    }
  function stock_product(){
    var Product_ID = $("#Product_ID").val();
    var Selling_price = $("#Selling_price").val();
    var buying_price = $("#buying_price").val();
    var Quantity = $("#Quantity").val();
    if(Product_ID==''){
      $('#Product_ID').css("border","2px solid red");
    }else if(Selling_price==''){
      $('#Selling_price').css("border","2px solid red");
    }else if(buying_price==''){
      $('#buying_price').css("border","2px solid red");
    }else if(Quantity==''){
      $("#Quantity").css("border","2px solid red");
    }else{
      $("#Product_ID").css("border","");
      $("#Selling_price").css("border","");
      $("#buying_price").css("border","");
      $("#Quantity").css("border","");
    //alert(Product_ID +Selling_price +buying_price +Quantity);
    $.ajax({
      type:'POST',
      url:'Store_productin_stock.php',
      data:{Product_ID:Product_ID, Selling_price:Selling_price, buying_price:buying_price, Quantity:Quantity, stock:''},
      success:function(responce){
        alert("DATA SAVE");
        product_instock();
      }
    });
    }
  }
  function product_instock(){
    $.ajax({
      type:'POST',
      url:'Store_productin_stock.php',
      data:{},
      success:function(responce){
        $("#product_in_store").html(responce);
      }
    });
  }
  function filtersalesreport(){
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    if(start_date ==''){
      $('#start_date').css("border","2px solid red");
    }else if(end_date==''){
      $('#end_date').css("border","2px solid red");
    }else {
      $('#start_date').css("border","");
      $('#end_date').css("border","");
      document.getElementById('class_loader').innerHTML = '<div align="center" style="" id="progressStatus"><img src="images/ajax-loader_1.gif" width="" style="border-color:white "></div>';
    //  alert(start_date  + end_date);
      $.ajax({
        type:'post',
        url:'ajax_filter_product_sold.php',
        data:{start_date:start_date, end_date:end_date, filterbtn:''},
        success:function(responce){
          $("#sales_record").html(responce);
        }
      });
    }


  }
  function capture_customer_id(Customer_ID){
//alert("hhhhhhhhhh");
    $.ajax({
      type:'POST',
      url:'selected_customer_cells_today.php',
      data:{Customer_ID:Customer_ID},
      success:function(responce){
        $("#cellproduct_tab").attr("class","active");
        $("#Client_tab").attr("class","");
        $("#cellproduct").show();
        $("#Client").hide();
        $("#div_to_cell_product").html(responce);
        $(document).ready(function(){
          today_product_sold()
        });
      }
    });
  }

function cell_that_product(Product_ID){
  var inp_id = "id"+Product_ID;
  var Customer_ID = $('#selected_customer_id').val();
  var quantity = $('#'+inp_id).val();
  var balance = $('#balance').val();
  //alert(quantity+balance);
  if(quantity > balance){
      $("#"+inp_id).css("border","2px solid red");
      alert('Stock is less than the value CHANGE QUANTITY VALUE');

  }else{
 if(quantity==""){
    $("#"+inp_id).css("border","2px solid red");
    exit();
  }else{
    $("#"+inp_id).css("border","");
  $.ajax({
    type:'POST',
    url:'cell_product.php',
    data:{selected_customer_id:Customer_ID, quantity:quantity, Product_ID:Product_ID},
    success:function(responce){
      alert("Umeuza kikamilifu");
      today_product_sold()
    }
  });
}
}
}
function today_product_sold(){
    var Customer_ID = $('#selected_customer_id').val();
    $.ajax({
      type:'POST',
      url:'ajax_today_product_sold.php',
      data:{Customer_ID:Customer_ID},
      success:function(responce){
        $("#product_sold_today_now").html(responce);
      }
    });
}
function remove_product(Cell_ID){
  $.ajax({
    type:'POST',
    url:'ajax_today_product_sold.php',
    data:{Cell_ID:Cell_ID, removebtn:''},
    success:function(responce){
      today_product_sold();
    }
  });
}
function preview_invoice(){
  var Customer_ID = $('#selected_customer_id').val();

    $.ajax({
      type:'POST',
      url:'ajax_preview_invoice.php',
      data:{Customer_ID:Customer_ID},
      success:function(responce){
        $("#preview_invoice_div").html(responce);
      }
    });
}

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

function lpo(){
  alert("ghjjjjjjjjjjjjjjjjjj");
  $.ajax({
    type:'POST',
    url:'ajax_local_purchase_order.php',
    data:{},
    success:function(responce){
      $("#local_purchase_form").html(responce);
    }
  });
}

</script>
<script>
$(document).ready(function(){

  $("#show_company_register").hide();
  $("#company_account_form").hide();
  $("#adduser_form").hide();
  $("#iterm_form").hide();

  $("#company_details").on("click", function(){
    $("#show_company_register").show();
      $("#company_account_form").hide();
      $("#adduser_form").hide();
      $("#iterm_form").hide();
  });
  $("#company_account").on("click",function(){
    $("#company_account_form").show();
    $("#show_company_register").hide();
    $("#adduser_form").hide();
    $("#iterm_form").hide();
  });

  $("#adduser").on("click", function(){
    $("#adduser_form").show();
    $("#show_company_register").hide();
    $("#company_account_form").hide();
    $("#iterm_form").hide();
  });

  $("#iterm").on("click", function(){
    consolo.log("#iterm_form");
    $("#iterm_form").show();
    $("#adduser_form").hide();
    $("#show_company_register").hide();
    $("#company_account_form").hide();
  });
});

function add_iterm(){

    var iterm_form = $("#iterm_form").val();
    $.ajax({
      type:'POST',
      url:'dashboard2s.php',
      data:{iterm_form:iterm_form},
      success:function(responce){
        $("#iterm_form").html(responce);
      }
    });
}
function company_logo_dialog(){
  var company_ID = '<?php echo $company_ID; ?>';
  $.ajax({
    type:'POST',
    url:'company_logo.php',
    data:{company_ID:company_ID},
    success:function(responce){
      $("#edit_user").dialog({
             title: 'UPLOAD COMPANY LOGO ',
             width: '50%',
             height: 350,
             modal: true,
         });
         $("#edit_user").html(responce);
    }
  });
}

function openform(evt, formname) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++){
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(formname).style.display = "block";
  evt.currentTarget.className += " active";
}
function customerNameSeach(){
  var Client_name = $("#Client_name").val();
  $.ajax({
    type:'POST',
    url:'ajax_search_customer_name.php',
    data:{Client_name:Client_name},
    success:function(responce){
      $("#list_of_all_customer").html(responce);
    }
  });
}
</script>
