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
                                    <img src="<?=base_url();?>assets/admin/berita_img/<?=$b->image;?>" alt="">
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
        </div>
    </section>