<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Kasembon Rafting</title>

    <!-- Favicon -->
    <link rel="icon" href="<?=base_url();?>assets/img/core-img/canoe.png">

    <!-- Core Stylesheet -->
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- style css -->
    <link href="<?=base_url();?>assets/admin/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?=base_url();?>assets/css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_reservasi animated sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-12">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            <a class="navbar-brand" href="#">KR</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="index#beranda">Beranda</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index#tentang_kami">Tentang Kami</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index#berita">Berita</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index#galeri">Galeri</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index#paket_tour">Paket Tour</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index#kontak">Kontak</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index#buku_tamu">Buku Tamu</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <section class="special-area section_padding_100" id="beritauser">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Berita</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach($query as $l){?>
            <div class="col-md-3">
            <div class="owl-item square-box"><a href="#" data-toggle="modal" data-target="#modal<?=$l->id_berita;?>">
                                <div class="single-shot single-special bg-white" style="border-radius:20px;border:none;">
                                <div style="text-align:center">
                                    <img src="<?= base_url();?>assets/admin/berita_img/<?= $l->image?>" alt="">
                                    </div>
                                    <div class="line-shape"></div>
                                    <h6 class="title-purple text-center"><?= $l->judul?></h6>
                                </a></div>
            </div>
                </div>
                <?php }?>
        </div>
            </div>
            <?php foreach($query as $b){?>
                <div class="modal fade" id="modal<?=$b->id_berita;?>">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title text-center"><?=$b->judul?></h1>
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            <div class="modal-body">
                                <div style="text-align:center;">
                                <img src="<?=base_url();?>assets/admin/berita_img/<?=$b->image;?>">
                            </div>
                                <div style="margin-top:20px;">
                                    <?= $b->isi?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
    </section>

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix">
        <!-- footer logo -->
        <div class="footer-text">
            <h2 class="text-white">KASEMBON RAFTING</h2>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->
            <p>Copyright ©2017 Ca. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->

    <!-- Jquery-2.2.4 JS -->
    <script src="<?=base_url();?>assets/js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?=base_url();?>assets/js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="<?=base_url();?>assets/js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="<?=base_url();?>assets/js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="<?=base_url();?>assets/js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="<?=base_url();?>assets/js/active.js"></script>
</body>

</html>
