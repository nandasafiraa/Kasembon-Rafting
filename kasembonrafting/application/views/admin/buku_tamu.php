<div class="col-md-12 col-sm-12">
                <div class="x_panel" style="width:100%">
                  <div class="x_content">
                    <h2>Buku Tamu</h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="float-right">
                  <select name="select" id="select" class="button-menu" style="border:none; margin-right:10px; cursor:pointer; padding:10px;">
                  <option value="nama">Nama</option>
                  <option value="email">Email</option>
                  <option value="telpon">Telpon</option>
                  <option value="isi_aduan">Isi Aduan</option>
                  <option value="tipe">Tipe</option>
                  </select>
                  <input type="search" id="search" name="search" placeholder="search...">
                </div>
                  <div class="x_content">
                  <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Telpon</th>
                          <th>Isi Aduan</th>
                          <th>Tipe</th>
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
          <td><?= $l->nama?></td>
          <td><?= $l->email?></td> 
          <td><?= $l->telpon?></td>
          <td><?= $l->isi_aduan?></td> 
          <td><?= $l->tipe?></td> 
          <td>
          <a data-placement="bottom" class="btn aksi" href="<?=base_url();?>kasembon/deletebuku/<?= $l->id?>" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>
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
                  </div>
                </div>
              </div>
    
              <script>
$.getJSON("<?=base_url()?>index.php/kasembon/get_bukutamu",function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+dt['nama']+'</td>'+
          '<td>'+dt['email']+'</td>'+
          '<td>'+dt['telpon']+'</td>'+
          '<td>'+dt['isi_aduan']+'</td>'+
          '<td>'+dt['tipe']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn" href="<?=base_url();?>kasembon/deletebuku/'+dt['id']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
    });
    
$("#search").on('keyup',function(){
  var selected = $("#select").children("option:selected").val();
		$.getJSON("<?=base_url()?>index.php/kasembon/search/buku_tamu/"+selected+"/"+$("#search").val(),function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+dt['nama']+'</td>'+
          '<td>'+dt['email']+'</td>'+
          '<td>'+dt['telpon']+'</td>'+
          '<td>'+dt['isi_aduan']+'</td>'+
          '<td>'+dt['tipe']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn" href="<?=base_url();?>kasembon/deletebuku/'+dt['id']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
		});
  });
  </script>