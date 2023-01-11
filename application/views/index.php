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

    <!-- Responsive CSS -->
    <link href="<?=base_url();?>assets/css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
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

    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="beranda">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading">
                        <h2>Kasembon Rafting</h2>
                        <h3>KR</h3>
                        <p>Rafting terbaik dengan keseruan yang tak terbayangkan!</p>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
        <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
            <img src="<?=base_url();?>assets/img/bg-img/rafting.png" alt="">
        </div>
    </section>
    <!-- ***** Wellcome Area End ***** -->

    <!-- ***** Tentang Kami ***** -->
    <section class="special-area bg-white section_padding_100" id="tentang_kami">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Tentang Kami</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach($tentang as $t){?>
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            <img src="<?= base_url();?>assets/image/<?= $t->image?>" width="80" height="80" style="border-radius:50px; object-fit:cover;" alt="">
                        </div>
                        <!-- <h4></h4> -->
                        <p><?= $t->deskripsi?></p>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <!-- Special Description Area -->
        <div class="special_description_area mt-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="special_description_img">
                            <img src="<?=base_url();?>assets/img/bg-img/special-rafting.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 ml-xl-auto">
                        <div class="special_description_content">
                            <h2>Best For You</h2>
                            <p>Kasembon Rafting adalah pilihan olahraga yang sangat tepat karena mengasyikkan dan Anda juga dapat menikmati pemandangan alam yang sangat indah. Panorama alam yang cantik dan suara gemuruh air yang menggelitik telinga kita membuat suasana hati menjadi semakin bersemangat, sekaligus menjadi pelepas lelah Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Special Area End ***** -->

    <!-- ***** Berita ***** -->
    
    <section class="clients-feedback-area app-screenshots-area section_padding_0_100 clearfix" id="berita">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2 style="margin-top:50px;">Berita</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- App Screenshots Slides  -->
                    <div class="app_screenshots_slides owl-carousel text-center">
                        <?php foreach($berita as $b){?>
                            <a href="#" data-toggle="modal" data-target="#modal<?=$b->id_berita;?>">
                                <div class="single-shot single-special bg-white">
                                    <img src="<?=base_url();?>assets/image/<?=$b->image;?>" alt="">
                                    <div class="line-shape"></div>
                                    <h4><?=$b->judul?></h4>
                                </div>
                            </a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="row section_padding_20">
                <div class="col-12">
                    <div class="get-view-more-button wow bounceInDown" data-wow-delay="0.5s">
                        <a href="<?= base_url();?>Kasembon/beritauser">View More</a>
                    </div>
                </div>
            </div>

            <?php foreach($berita as $b){?>
                <div class="modal fade" id="modal<?=$b->id_berita;?>">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title text-center"><?=$b->judul?></h1>
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            <div class="modal-body">
                                <div style="text-align:center;">
                                <img src="<?=base_url();?>assets/image/<?=$b->image;?>">
                            </div>
                                <div style="margin-top:20px;">
                                    <?= $b->isi?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>
    <!-- ***** Awesome Features End ***** -->
    
    <!-- ***** galeri ***** -->
    <section class="app-screenshots-area bg-white section_padding_0_100 clearfix" id="galeri">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2 style="margin-top:50px;">Galeri</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- App Screenshots Slides  -->
                    <div class="app_screenshots_slides owl-carousel">
                        <?php foreach($galeri as $g){?>
                            <div class="single-shot">
                                <img style="width:250px;height:200px;object-fit:cover;" src="<?=base_url();?>assets/image/<?= $g->image?>" alt="<?= $g->caption?>" id="myImg<?=$g->id_gambar;?>" class="myImg">
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php foreach($galeri as $g){?>
        <div id="myModal<?=$g->id_gambar;?>" class="modals">
            <span class="closes">&times;</span>
            <img class="modals-content" style="width:700px;height:400px;object-fit:cover;" id="img<?=$g->id_gambar;?>">
            <div id="caption<?=$g->id_gambar;?>" class="text-center text-light"></div>
        </div>
    <?php } ?>
    <!-- ***** App Screenshots Area End *****====== -->

    <!-- ***** Pricing Plane Area Start *****==== -->
    <section class="pricing-plane-area section_padding_100_70 clearfix" id="paket_tour">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text  -->
                    <div class="section-heading text-center">
                        <h2>Paket Tour</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <?php foreach($tur as $t){?>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5><?= $t->nama_paket?></h5>
                            <div class="ca-price d-flex justify-content-center">
                                <span>Rp.</span>
                                <h4><?= $t->harga?></h4>
                            </div>
                        </div>
                        <div class="package-description col-12">
                            <p><?= $t->fasilitas_1?></p>
                            <p><?= $t->fasilitas_2?></p>
                            <p><?= $t->fasilitas_3?></p>
                            <p><?= $t->fasilitas_4?></p>
                            <p><?= $t->fasilitas_5?></p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="kasembon/reservasiuser">Pilih</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plane Area End ***** -->

    
    <!-- ***** Client Feedback Area End ***** -->

    <!-- ***** CTA Area Start ***** -->
    <section class="our-monthly-membership section_padding_50 clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="membership-description">
                        <h2>Join With Our Rafting</h2>
                        <p>Yuk, buruan reservasi dan rasakan keseruan raftingnya!</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                        <a href="kasembon/reservasiuser">Reservasi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** CTA Area End ***** -->

    <!-- ***** Our Team Area Start ***** -->
    <section class="our-Team-area bg-white section_padding_100_50 clearfix" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Kontak</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="<?=base_url();?>assets/img/team-img/team-1.jpg" alt="">
                        </div>
                        <div class="member-text">
                            <h4>Jackson Nash</h4>
                            <p>Tax Advice</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> 0895377154721</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="<?=base_url();?>assets/img/team-img/team-2.jpg" alt="">
                        </div>
                        <div class="member-text">
                            <h4>Alex Manning</h4>
                            <p>CEO-Founder</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> 0895377154721</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="<?=base_url();?>assets/img/team-img/team-3.jpg" alt="">
                        </div>
                        <div class="member-text">
                            <h4>Ollie Schneider</h4>
                            <p>Business Planner</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> 0895377154721</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="<?=base_url();?>assets/img/team-img/team-4.jpg" alt="">
                        </div>
                        <div class="member-text">
                            <h4>Roger West</h4>
                            <p>Financer</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> 0895377154721</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Team Area End ***** -->

    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="buku_tamu">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Buku Tamu</h2>
                        <div class="line-shape"></div>
                    </div>
                    <div class="footer-text">
                        <p>Anda dapat mengisinya dengan kritik dan saran, pengaduan, ataupun yang lainnya</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Start-->
                    <div class="contact_from">
                        <form action="<?=base_url();?>Kasembon/addbuku" method="post">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama" id="name" placeholder="Isikan Nama Anda" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Isikan Email Anda" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="telpon" id="telp" placeholder="Isikan Telepon Anda" required>
                                        </div>
                                    </div>
                                     <!-- Single Input Area Start -->
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="tipe" id="tipe" class="form-control">
                                                <option value="-">Pilih Tipe</option>
                                                <option value="produk">Tentang Produk</option>
                                                <option value="pengaduan">Pengaduan</option>
                                                <option value="umum">Umum</option>
                                                <option value="lainnya">lainnya</option>
                                            </select>                                       
                                        </div>
                                    </div> 
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="isi_aduan" class="form-control" id="message" cols="30" rows="4" placeholder="Isikan Pesan Anda" required></textarea>
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
    <!-- ***** Contact Us Area End ***** -->

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

    <script>
    // Get the modal
    <?php foreach($galeri as $g){?>
        var modal = document.getElementById("myModal<?=$g->id_gambar;?>");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg<?=$g->id_gambar?>");
        var modalImg = document.getElementById("img<?=$g->id_gambar?>");
        var captionText = document.getElementById("caption<?=$g->id_gambar?>");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("closes")[<?=$g->id_gambar-1;?>];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            modal.style.display = "none";
        }
    <?php } ?>
    </script>

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
