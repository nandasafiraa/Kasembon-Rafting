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
    <header class="header_reservasi animated sticky" style="background:#884bdf;">
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
                                    <li class="nav-item active"><a class="nav-link" href="#beranda">Beranda</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tentang_kami">Tentang Kami</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#paket_tour">Paket Tour</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#buku_tamu">Buku Tamu</a></li>
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
    <section class="special-area bg-white section_padding_100" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Reservasi</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 text-center offset-sm-3">
                    <!-- Form Start-->
                    <div class="contact_from">
                        <form action="<?=base_url();?>Kasembon/addreservasi" method="post">
                            <!-- Message Input Area Start -->
                            <div class="reservasi-input-area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-10 offset-sm-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control reservasi-input" name="nama" id="nama" placeholder="Isikan Nama Anda" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-10 offset-sm-1">
                                        <div class="form-group">
                                            <input type="email" class="form-control reservasi-input" name="email" id="emailuser" placeholder="Isikan Email Anda" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-10 offset-sm-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control reservasi-input" name="telpon" id="telpon" placeholder="Isikan Telepon Anda" required>
                                        </div>
                                    </div>
                                     <!-- Single Input Area Start -->
                                     <div class="col-md-10 offset-sm-1">
                                        <div class="form-group">
                                            <select name="paket_id" id="paket_id" class="form-control reservasi-input">
                                                <option value="-">Pilih Paket</option>
                                                <?php foreach($query as $l){?>
                                                <option value="<?= $l->id?>"><?= $l->nama_paket?></option>
                                                <?php }?>
                                            </select>                                       
                                        </div>
                                    </div> 
                                     <!-- Single Input Area Start -->
                                     <div class="col-md-10 offset-sm-1">
                                        <div class="form-group">
                                            <input type="number" class="form-control reservasi-input" name="jumlah_orang" id="jumlah_orang" placeholder="Isikan jumlah orang" required>
                                        </div>
                                    </div>
                                     <!-- Single Input Area Start -->
                                     <div class="col-md-10 offset-sm-1">
                                        <div class="form-group">
                                            <input type="date" class="form-control reservasi-input" name="untuk_tanggal" id="untuk_tanggal" placeholder="Reservasi untuk tanggal" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-10 offset-sm-1">
                                        <div class="form-group">
                                            <textarea name="catatan" class="form-control reservasi-input" id="catatan" cols="30" rows="4" placeholder="Isikan catatan anda... " required></textarea>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
                </div>
        </div>
            </div>
           
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
