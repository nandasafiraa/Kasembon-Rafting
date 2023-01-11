<div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h2>Paket Tour</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div>
                  <button class="btn button-menu btn-fw float-left" data-toggle="modal" data-target="#tambah">Tambah</button>
                <div class="float-right">
                  <select name="select" id="select" class="button-menu" style="border:none; margin-right:10px; cursor:pointer; padding:10px;">
                  <option value="nama_paket">Nama Paket</option>
                  <option value="fasilitas_1">Fasilitas 1</option>
                  <option value="fasilitas_2">Fasilitas 2</option>
                  <option value="fasilitas_3">Fasilitas 3</option>
                  <option value="fasilitas_4">Fasilitas 4</option>
                  <option value="fasilitas_5">Fasilitas 5</option>
                  <option value="harga">Harga</option>
                  </select>
                  <input type="search" id="search" name="search" placeholder="Ketik sesuatu...">
                </div>
                  </div>                  
                  <div class="x_content">
                  <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Paket</th>
                          <th>Fasilitas 1</th>
                          <th>Fasilitas 2</th>
                          <th>Fasilitas 3</th>
                          <th>Fasilitas 4</th>
                          <th>Fasilitas 5</th>
                          <th>Harga</th>
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
          <td><?= $l->nama_paket?></td>
          <td><?= $l->fasilitas_1?></td>
          <td><?= $l->fasilitas_2?></td>
          <td><?= $l->fasilitas_3?></td>
          <td><?= $l->fasilitas_4?></td>
          <td><?= $l->fasilitas_5?></td>
          <td><?= $l->harga?></td>
          <td>
          <a data-placement="bottom" class="btn aksi" rel="tooltip" title="Edit" onclick="detail_tur(<?= $l->id?>)" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>
          <a data-placement="bottom" class="btn aksi" href="<?=base_url();?>kasembon/deletetur/<?= $l->id?>" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>
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

<!-- modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Paket Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url();?>index.php/kasembon/addtur" method="post">
      <div class="form-group">
        <label for="judul">Nama Paket</label>
        <br>
        <input type="text" class="form-control" name="nama_paket" placeholder="Isikan Nama Paket">
        <br>
        <label for="tgl">Fasilitas 1</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_1" placeholder="Isikan Fasilitas 1">
        <br>
        <label for="tgl">Fasilitas 2</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_2" placeholder="Isikan Fasilitas 2">
        <br>
        <label for="tgl">Fasilitas 3</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_3" placeholder="Isikan Fasilitas 3">
        <br>
        <label for="tgl">Fasilitas 4</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_4" placeholder="Isikan Fasilitas 4">
        <br>
        <label for="tgl">Fasilitas 5</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_5" placeholder="Isikan Fasilitas 5">
        <br>
        <label for="tgl">Harga</label>
        <br>
        <input type="number" class="form-control" name="harga" placeholder="Isikan harga paket">
    </div>
    <button type="submit"name="submit" class="btn button-menu mr-2">Simpan</button>
    </form>
            </div>
    </div>
  </div>
</div>

<!-- modal update -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Paket Tur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url();?>index.php/kasembon/updatetur" method="post">
      <div class="form-group">
      <input type="hidden" id="id" name="id" value="">
        <label for="judul">Nama Paket</label>
        <br>
        <input type="text" class="form-control" id="nama_paket" name="nama_paket">
        <br>
        <label for="tgl">Fasilitas 1</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_1" id="fasilitas_1">
        <br>
        <label for="tgl">Fasilitas 2</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_2" id="fasilitas_2">
        <br>
        <label for="tgl">Fasilitas 3</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_3" id="fasilitas_3">
        <br>
        <label for="tgl">Fasilitas 4</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_4" id="fasilitas_4">
        <br>
        <label for="tgl">Fasilitas 5</label>
        <br>
        <input type="text" class="form-control" name="fasilitas_5" id="fasilitas_5">
        <br>
        <label for="tgl">Harga</label>
        <br>
        <input type="number" class="form-control" name="harga" id="harga">
    </div>
    <button type="submit"name="submit" class="btn button-menu mr-2">Simpan</button>
    </form>
            </div>
    </div>
  </div>
</div>

<!-- get detil tur -->
<script>
    function detail_tur(id) {
      $.getJSON("<?=base_url();?>Kasembon/detiltur/"+id, function(data){
			$("#id").val(data.id);
      $("#nama_paket").val(data.nama_paket);
      $("#fasilitas_1").val(data.fasilitas_1);
      $("#fasilitas_2").val(data.fasilitas_2);
      $("#fasilitas_3").val(data.fasilitas_3);
      $("#fasilitas_4").val(data.fasilitas_4);
      $("#fasilitas_5").val(data.fasilitas_5);
      $("#harga").val(data.harga);
          });
        }
    </script>

<script>
    $("#search").on('keyup',function(){
  var selected = $("#select").children("option:selected").val();
		$.getJSON("<?=base_url()?>index.php/kasembon/search/paket_tour/"+selected+"/"+$("#search").val(),function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+dt['nama_paket']+'</td>'+
          '<td>'+dt['fasilitas_1']+'</td>'+
          '<td>'+dt['fasilitas_2']+'</td>'+
          '<td>'+dt['fasilitas_3']+'</td>'+
          '<td>'+dt['fasilitas_4']+'</td>'+
          '<td>'+dt['fasilitas_5']+'</td>'+
          '<td>'+dt['harga']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn aksi" rel="tooltip" title="Edit" onclick="detail_tr('+dt['id']+')" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>'+
          '<a data-placement="bottom" class="btn aksi" href="<?=base_url();?>kasembon/deletetur/'+dt['id']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
		});
  });
  </script>