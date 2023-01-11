<div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h2>Reservasi</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="float-right">
                  <select name="select" id="select" class="button-menu" style="border:none; margin-right:10px; cursor:pointer; padding:10px;">
                  <option value="nama">Nama</option>
                  <option value="email">Email</option>
                  <option value="telpon">Telepon</option>
                  <option value="paket_id">Id paket</option>
                  <option value="jumlah_orang">Jumlah Orang</option>
                  <option value="untuk_tanggal">Untuk Tanggal</option>
                  <option value="tanggal_pemesanan">Tgl Pemesanan</option>
                  <option value="catatan">Catatan</option>
                  </select>
                  <input type="search" id="search" name="search" placeholder="search...">
                  </div>
                  <div class="x_content">
                  <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr style="text-align: center;">
                          <th>No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Telpon</th>
                          <th>Id Paket</th>
                          <th>Jumlah Orang</th>
                          <th>Untuk Tgl</th>
                          <th>Tgl Pemesanan</th>
                          <th>Catatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="cari">
                  <?php 
                  $no = 1;
                  foreach($query as $l){?>
            <tr>
          <td><?= $no?></td>
          <td><?= $l->nama?></td>
          <td><?= $l->email?></td>
          <td><?= $l->telpon?></td>
          <td><?= $l->paket_id?></td>
          <td><?= $l->jumlah_orang?></td>
          <td><?= $l->untuk_tanggal?></td>
          <td><?= $l->tanggal_pemesanan?></td>
          <td><?= $l->catatan?></td>
          <td>
          <a data-placement="bottom" class="btn aksi" href="<?=base_url();?>kasembon/deletereservasi/<?= $l->id?>" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
                  
                  <?php $no++;} ?>
                  
                      </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    <?php if ($this->session->flashdata('pesan')!=null): ?>
									    <div class="alert" style="background:#fb397d;color:white;"><?= $this->session->flashdata('pesan');?></div>
								    <?php endif?>
                  </div>
                </div>
              </div>

              <script>
$("#search").on('keyup',function(){
  var selected = $("#select").children("option:selected").val();
		$.getJSON("<?=base_url()?>index.php/kasembon/search/reservasi/"+selected+"/"+$("#search").val(),function(data){
      var datanya="";
      var no = 1;
			$.each(data,function(key,dt){
        datanya+=
        '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+dt['nama']+'</td>'+
          '<td>'+dt['email']+'</td>'+
          '<td>'+dt['telpon']+'</td>'+
          '<td>'+dt['paket_id']+'</td>'+
          '<td>'+dt['jumlah_orang']+'</td>'+
          '<td>'+dt['untuk_tanggal']+'</td>'+
          '<td>'+dt['tanggal_pemesanan']+'</td>'+
          '<td>'+dt['catatan']+'</td>'+
          '<td>'+
          '<a data-placement="bottom" class="btn" href="<?=base_url();?>kasembon/deletereservasi/'+dt['id']+'" rel="tooltip" title="Delete" onclick="return confirm(`Anda yakin ingin menghapus?`)"><i class="fa fa-trash"></i></a>'+
          '</td>'+
        '</tr>';
        no++;
      });
      $("#cari").html(datanya);
		});
  });
  </script>

