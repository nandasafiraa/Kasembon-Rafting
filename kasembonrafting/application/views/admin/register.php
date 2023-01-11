<div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h2>Admin</h2>
                    <div class="clearfix"></div>
                  </div>
                  <button class="btn button-menu" data-toggle="modal" data-target="#tambah">Tambah</button>
                  <div class="x_content">
                  <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr style="text-align: center;">
                          <th>No</th>
                          <th>Hak</th>
                          <th>username</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                $no = 1;
                foreach($arr as $r){?>
                <tr style="text-align: center;">
                      <td><?= $no ?></td>
                      <td><?php if($r->hak == 1){echo "admin";} ?></td>
                      <td><?= $r->username ?></td>
                      <td>
                       <div id="btn-act" class="btn-group">
							 	<a data-placement="bottom" class="btn aksi" rel="tooltip" title="Edit" onclick="detail_register(<?= $r->id?>)" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></a>
							 	<a data-placement="bottom" class="btn aksi" onclick="return confirm('Anda yakin ingin menghapus?')" href="http://localhost/kasembonrafting/kasembon/deleteregister/<?= $r->id?>" rel="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
						 	</div>
                       </td>
                       </tr>
                       <?php
                $no++;
                }
                ?>   
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

<!-- modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true" method="post" enctype="multipart/form-data">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"style="width:125%;" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="http://localhost/kasembonrafting/index.php/kasembon/addregister" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label >Username</label><br>        
        <input type="text" class="form-control" name="username" placeholder="Isikan username mu">
        <label >Password</label><br>        
        <input type="password" class="form-control" name="password" placeholder="Isikan password mu">
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
        <h5 class="modal-title" id="exampleModalLabel">Update Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="http://localhost/kasembonrafting/index.php/kasembon/updateregister" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <input type="hidden" id="id" name="id" value="">
        <label >Username</label><br>        
        <input type="text" class="form-control" name="username" id="username" >
        <label >Password</label><br>        
        <input type="password" class="form-control" name="password" id="password" >
        <br>
    </div>
    <button type="submit"name="submit" class="btn button-menu mr-2">Simpan</button>
    </form>
            </div>
    </div>
  </div>
</div>

<!-- get detil tentang -->
<script>
    function detail_register(id) {
      $.getJSON("http://localhost/kasembonrafting/Kasembon/detilregister/"+id, function(data){
			$("#id").val(data.id);
            $("#hak").val(data.hak);
            $("#username").val(data.username);
            $("#password").val(data.password);
          });
        }
    </script>