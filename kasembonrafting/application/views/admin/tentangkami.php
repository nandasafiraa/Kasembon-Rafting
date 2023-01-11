<div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h2>Tentang Kami</h2>
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
                    <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Image</th>
                          <th>Deskripsi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="cari">
                      <?php 
                  $no = 1;
                  foreach($arr as $l){?>
           <tr>
          <td><?= $no?></td>
          <td>
          <img class="preview-img" src="<?=base_url();?>assets/images/<?= $l->image?>" width="100px"></img>
          </td>
          <td><?= $l->deskripsi?></td>
          <td>
          <a data-placement="bottom" class="btn aksi" rel="tooltip" title="Edit" onclick="detail_tentang(<?= $l->id ?>)" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>
          <a data-placement="bottom" class="btn aksi" href="<?=base_url();?>kasembon/deletetentang/<?= $l->id?>" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
                  
                  <?php $no++;} ?>
                  
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

<!-- modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true" method="post" enctype="multipart/form-data">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"style="width:125%;" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tentang Kami</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url();?>kasembon/addtentangkami" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="gambar" class="form-control"><br>
        <label >Deskripsi</label><br>
        <textarea rows="6" cols="1000" class="form-control" name="deskripsi" placeholder="isikan deskripsi..."></textarea>
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
        <h5 class="modal-title" id="exampleModalLabel">Update Tentang Kami</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url();?>kasembon/updatetentang" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <input type="hidden" id="id" name="id">
        <label>Upload Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control"><br>
        <label >Deskripsi</label><br>
        <textarea rows="6" cols="1000" class="form-control" name="deskripsi" id="deskripsi" placeholder="Enter text here..."></textarea>
        <br>
    </div>
    <button type="submit"name="submit" class="btn button-menu mr-2">Simpan</button>
    </form>
            </div>
    </div>
  </div>
</div>

<!-- get detil tentang -->
<script type="text/javascript">
    function detail_tentang(id) {
      $.getJSON("<?=base_url();?>Kasembon/detiltentang/"+id, function(data){
	  $("#id").val(data.id);
      $("#deskripsi").val(data.deskripsi);
          });
        }
</script>

<!-- search -->
<script>
$("#search").on('keyup',function(){
		$.getJSON("<?=base_url()?>index.php/kasembon/search/tentang/deskripsi/"+$("#search").val(),function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+
          '<img class="preview-img" src="<?=base_url();?>assets/images/'+dt['image']+'" width="100px"></img>'+
          '</td>'+
          '<td>'+dt['deskripsi']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn aksi" rel="tooltip" title="Edit" onclick="detail_tentang('+dt['id']+')" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>'+
          '<a data-placement="bottom" class="btn aksi" href="<?=base_url();?>kasembon/deletetetang/'+dt['id']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
		});
  });
  </script>