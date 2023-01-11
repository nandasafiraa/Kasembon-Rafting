<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=base_url();?>assets/img/core-img/canoe.png">

    <title>Admin Kasembon</title>

    <!-- Bootstrap -->
    <link href="<?=base_url();?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url();?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url();?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url();?>assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?=base_url();?>assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?=base_url();?>assets/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url();?>assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url();?>assets/admin/build/css/custom.min.css" rel="stylesheet">
    <!-- style css -->
    <link href="<?=base_url();?>assets/admin/style.css" rel="stylesheet">
    <script src="<?=base_url();?>assets/admin/vendors/jquery/dist/jquery.min.js"></script>


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title">
              <a href="index.html" class="site_title"><span>Kasembon Rafting</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url();?>assets/admin/production/images/img.png" alt="<?=base_url();?>assets/admin." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $this->session->userdata['username']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="beranda"><i class="fa fa-home"></i> Beranda <span class=""></span></a></li>
                  <li><a href="tentangkami"><i class="fa fa-edit"></i> Tentang Kami <span class=""></span></a></li>
                  <li><a href="berita"><i class="fa fa-newspaper-o"></i> Berita <span class=""></span></a></li>
                  <li><a href="galeri"><i class="fa fa-picture-o"></i> Galeri <span class=""></span></a></li>
                  <li><a href="paket_tour"><i class="fa fa-plane"></i> Paket Tour <span class=""></span></a></li>
                  <li><a href="bukutamu"><i class="fa fa-users"></i>Buku Tamu<span class=""></span></a></li>
                  <li><a href="reservasi"><i class="fa fa-tag"></i> Reservasi <span class=""></span></a></li>   
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Admin
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="admin"><i class="fa fa-user pull-right"></i> Admin</a>
                    <a class="dropdown-item"  href="signout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <?php
                $this->load->view($content_view);
            ?>
        </div>
          <!-- /top tiles -->
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <!-- Bootstrap -->
    <script src="<?=base_url();?>assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url();?>assets/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url();?>assets/admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?=base_url();?>assets/admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?=base_url();?>assets/admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url();?>assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url();?>assets/admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?=base_url();?>assets/admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?=base_url();?>assets/admin/vendors/Flot/jquery.flot.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url();?>assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?=base_url();?>assets/admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?=base_url();?>assets/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url();?>assets/admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?=base_url();?>assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url();?>assets/admin/build/js/custom.min.js"></script>
    <script src="<?=base_url();?>assets/admin/ckeditor/ckeditor.js"></script>
	
  </body>
</html>
