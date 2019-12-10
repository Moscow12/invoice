<?php
include("connection.php");
include("header.php");
include("session.php");
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
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar control-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="dashboard2_add_iterm.php" id="iterm" onclick="add_iterm()"> <span>Add iterm</span></a></li>
        <li><a href="scroll.php" id="client" href=""> <span>Add client </span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header" id="body_tag">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content container-fluid">
<?php echo $session_ID; ?>
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div id="iterm_form">
          <div class="col-md-2"></div>
          <div class="col-md-8">
          <div class="box">
              <div class="box-header">REGISTER COMPANY ACCOUNT</div>
              <div class="box-body">
                  <form action="setting_db.php" method="post">
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Product name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="" name="product_name" placeholder="Account name">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Product Description</label>
                          <div class="col-sm-9">
                              <textarea class="form-control" name="product_description" rows="2"></textarea>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Product Price</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="" placeholder="Product Price" name="product_price">
                          </div>
                      </div>
                      <button type="submit"  class="btn btn-info" name="company_account">Submit</button>
                  </form>
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
        <div class="" id="show_company_register">
          <div class="col-md-2"></div>
          <div class="col-md-8">
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
                          <label for="" class="col-sm-3 col-form-label">Location</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id=""  name="comany_location">
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
          <div class="col-md-2"></div>
          </div>
          <div id="company_account_form">
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
            <div class="col-md-2"></div>
          </div>
          <div id="adduser_form">
                <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="box">
                          <div class="box-header center"><center>REGISTER USER</center></div>
                          <div class="box-body">
                              <form action="" method="post">
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
                                          <input type="text" class="form-control" id="" name="username" placeholder="User name">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="" class="col-sm-3 col-form-label">Phone Number</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="" placeholder="Phone Number" name="phonenumber">
                                      </div>
                                  </div>

                                   <a href="setting_db.php" id="login" class="btn btn-info pull-right">SAVE</a>
                              </form>
                          </div>
                          <div class="col-md-2"></div>
          </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
  $("#show_company_register").hide();
  $("#company_account_form").hide();
  $("#adduser_form").hide();
//  $("#iterm_form").hide();

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
      $("#logo").dialog({
             title: 'UPLOAD COMPANY LOGO ',
             width: '80%',
             height: 550,
             modal: true,
         });
         $("#logo").html(responce);
    }
  });
}
</script>
