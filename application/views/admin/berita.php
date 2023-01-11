<div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h2>Berita</h2>
                    <div class="clearfix"></div>
                  </div>
                  <button class="btn btn-dark btn-fw" data-toggle="modal" data-target="#tambah">Tambah</button><br>
                  <select name="select" id="select">
                  <option value="judul">Judul</option>
                  <option value="isi">tgl</option>
                  <option value="isi">isi</option>
                  </select>
                  <input type="search" id="search" name="search" placeholder="serach...">
                  <a data-placement="bottom" class="btn aksi" rel="tooltip" title="search" data-target=""><i class="fa fa-search"></i></a>
                  <div class="x_content">
                  <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul Berita</th>
                          <th>Gambar</th>
                          <th>Tanggal</th>
                          <th>Isi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="cari">
                      
                      </tbody>
                    </table>
              </div>
              </div>
              </div>
              <?php if ($this->session->flashdata('pesan')!=null): ?>
									    <div class="alert alert-danger"><?= $this->session->flashdata('pesan');?></div>
								    <?php endif?>
                  </div>
                </div>
              </div>
    
<!-- modal_tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-left:140px;">
    <div class="modal-content" style="width:220%;" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url();?>index.php/kasembon/addberita" method="post" enctype="multipart/form-data">
      <div class= "form-group">
        <label for="judul">Judul</label>
        <script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>
        <input type="text" class="form-control" name="judul" placeholder="Isikan Judul Berita">
        <br>
        <label for="image">Gambar</label>
        <br>
        <input type="file" class="form-control" placeholder="Pilih Gambar" name="image">
        <label for="tgl">Tanggal</label>
        <br>
        <input type="date" name="tgl">
        <br>
        <label for="ckedtor">Isi</label>
        <textarea class="ckeditor" id="ckedtor" name="isi" placeholder="Isikan Isi Berita"></textarea>
    </div>
    <button type="submit"name="submit" class="btn btn-success mr-2">Simpan</button>
    </form>
            </div>
    </div>
  </div>
</div>

<!-- modal update -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-left:140px;">
    <div class="modal-content"  style="width:220%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url();?>index.php/kasembon/updateberita" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <input type="hidden" id="id_berita" name="id_berita">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Isikan Judul Berita">
        <br>
        <label for="image">Gambar</label>
        <br>
        <input type="file" class="form-control" placeholder="Pilih Gambar" name="image">
        <br>
        <label for="tgl">Tanggal</label>
        <br>
        <input type="date" name="tgl" id="tgl">
        <br>
        <label for="ckedtor">Isi</label>
        <textarea class="ckeditor" id="isi" name="isi" placeholder="Isikan Isi Berita"></textarea>
    </div>
    <button type="submit"name="submit" class="btn btn-success mr-2">Simpan</button>
    </form>
            </div>
    </div>
  </div>
</div>
    <script type="text/javascript">
    $(document).on('click', '#submit', function() {
    var isi_berita = CKEDITOR.instances['isi-berita'].getData();
    $.ajax({
       type: "POST",
       url: "<?=base_url();?>Kasembon/berita",
       data: {'berita': isi_berita },
       success: function (data) {
           alert("Berita berhasil disimpan.");
       }
    });
});
function detail_berita(id) {
      $.getJSON("<?=base_url();?>Kasembon/detilberita/"+id, function(data){
	  $("#id_berita").val(data.id_berita);
      $("#judul").val(data.judul);
      $("#tgl").val(data.tgl);
      CKEDITOR.instances['isi'].setData(data.isi);
          });
        }

</script>

<script>
$.getJSON("<?=base_url()?>index.php/kasembon/get_berita",function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+dt['judul']+'</td>'+
          '<td>'+
          '<img class="preview-img" src="<?=base_url();?>assets/image/'+dt['image']+'" width="100px"></img>'+
          '</td>'+
          '<td>'+dt['tgl']+'</td>'+
          '<td>'+dt['isi']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn" rel="tooltip" title="Edit" onclick="detail_berita('+dt['id_berita']+')" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>'+
          '<a data-placement="bottom" class="btn" href="<?=base_url();?>kasembon/deleteberita/'+dt['id_gambar']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
    });
    
$("#search").on('keyup',function(){
  var selected = $("#select").children("option:selected").val();
		$.getJSON("<?=base_url()?>index.php/kasembon/search/berita/"+selected+"/"+$("#search").val(),function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+dt['judul']+'</td>'+
          '<td>'+
          '<img class="preview-img" src="<?=base_url();?>assets/image/'+dt['image']+'" width="100px"></img>'+
          '</td>'+
          '<td>'+dt['tgl']+'</td>'+
          '<td>'+dt['isi']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn" rel="tooltip" title="Edit" onclick="detail_berita('+dt['id_berita']+')" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>'+
          '<a data-placement="bottom" class="btn" href="<?=base_url();?>kasembon/deleteberita/'+dt['id_gambar']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
		});
  });
  </script>