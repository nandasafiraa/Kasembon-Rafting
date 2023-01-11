<div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h2>Galeri</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div>
                  <button class="btn button-menu btn-fw float-left" data-toggle="modal" data-target="#tambah">Tambah</button><br>
                 <input type="search" id="search" class="float-right" name="search" placeholder="search...">
                 </div>                  
                 <div class="x_content">
                  <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr style="text-align: center;">
                          <th>No</th>
                          <th>Image</th>
                          <th>Caption</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="cari">
                      <?php
                      $no = 1;
                      foreach($query as $l){
                         ?>
                        <tr>
          <td><?= $no?></td>
          <td><img class="preview-img" src="<?=base_url();?>assets/image_galeri/<?= $l->image?>" ></img></td>
          <td><?= $l->caption?></td> 
          <td>
          <a data-placement="bottom" class="btn aksi" rel="tooltip" title="Edit" onclick="detail_galeri(<?= $l->id_gambar?>)" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>
          <a data-placement="bottom" class="btn aksi" href="<?=base_url();?>kasembon/deletegaleri/<?= $l->id_gambar?>" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php 
                    $no++;
                    }?>

                      </tbody>
                    </table>
                    <?php echo $pagination; ?>
                    </div>
                    </div>
                    </div>
                    <?php if ($this->session->flashdata('pesan')!=null): ?>
									    <div class="alert" style="background:#fb397d;color:white;"><?= $this->session->flashdata('pesan');?></div>
								    <?php endif?>
                  </div>
                </div>
              </div>

<!-- modal insert -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"style="width:125%;" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url();?>index.php/kasembon/addgaleri" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="image" class="form-control"><br>
        <label for="nama_meja">Caption</label>
        <textarea rows="6" cols="1000" class="form-control" name="caption" placeholder="isikan caption..."></textarea>
        <br>
    </div>
    <button type="submit"name="submit" class="btn button-menu mr-2">Simpan</button>
    </form>
            </div>
    </div>
  </div>
</div>

<!-- modal update -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true" method="post" enctype="multipart/form-data">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"style="width:125%;" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Galeri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url();?>index.php/kasembon/updategaleri" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <input type="hidden" id="id_gambar" name="id_gambar" value="">
        <label>Upload Gambar</label>
        <input type="file" name="image" id="image" class="form-control"><br>
        <label >Caption</label><br>
        <input type="text" class="form-control" name="caption" id="caption" placeholder="Isikan caption mu">
        <br>
    </div>
    <button type="submit"name="submit" class="btn button-menu mr-2">Simpan</button>
    </form>
            </div>
    </div>
  </div>
</div>

<!-- get detil galeri -->
<script>
    function detail_galeri(id_gambar) {
      $.getJSON("<?=base_url();?>Kasembon/detilgaleri/"+id_gambar, function(data){
			$("#id_gambar").val(data.id_gambar);
      $("#caption").val(data.caption);
          });
        }
    </script>
    <script>
$.getJSON("<?=base_url()?>index.php/kasembon/get_galeri",function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+
          '<img class="preview-img" src="<?=base_url();?>assets/image_galeri/'+dt['image']+'" width="100px"></img>'+
          '</td>'+
          '<td>'+dt['caption']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn" rel="tooltip" title="Edit" onclick="detail_galeri('+dt['id_gambar']+')" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>'+
          '<a data-placement="bottom" class="btn" href="<?=base_url();?>kasembon/deletegaleri/'+dt['id_gambar']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
    });
    
$("#search").on('keyup',function(){
		$.getJSON("<?=base_url()?>index.php/kasembon/search/galeri/caption/"+$("#search").val(),function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+
          '<img class="preview-img" src="<?=base_url();?>assets/image_galeri/'+dt['image']+'" width="100px"></img>'+
          '</td>'+
          '<td>'+dt['caption']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn" rel="tooltip" title="Edit" onclick="detail_galeri('+dt['id_gambar']+')" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>'+
          '<a data-placement="bottom" class="btn" href="<?=base_url();?>kasembon/deletegaleri/'+dt['id_gambar']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
		});
  });
  </script>
