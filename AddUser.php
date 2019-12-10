<?php
include("connection.php");
include("header.php");
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
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
  <aside class="main-sidebar">

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
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
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
    <section class="content-header" id="body_tag">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="box">
        <div class="box-header center">REGISTER USER</div>
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

                        <input  hidden type="text" class="form-control" id=""  name="password" value="user123">


                 <a href="setting_db.php" id="login" class="btn btn-info pull-right">SAVE</a>
            </form>
        </div>
        <div class="col-md-2"></div>
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
            <li><a href="AddUser.php"><i class="fa fa-user"></i> <span>ADD USER</span></a></li>
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
        <!-- /.tab-pane -->
      </div>
    </aside>

        <?php include("footer.php"); ?>
