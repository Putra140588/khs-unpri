<script type="text/javascript">
	function cekform() {

		if(!$("#nik").val()) {
			alert('NIK tidak boleh kosong');
			$("#nik").focus()
			return false;
		}

		if(!$("#nama_dosen").val()) {
			alert('Nama Dosen tidak boleh kosong');
			$("#nama_dosen").focus()
			return false;
		}

		if(!$("#jenis_kelamin").val()) {
			alert('Jenis Kelamin tidak boleh kosong');
			$("#jenis_kelamin").focus()
			return false;
		}

		if(!$("#agama").val()) {
			alert('Agama tidak boleh kosong');
			$("#agama").focus()
			return false;
		}

		if(!$("#telepon").val()) {
			alert('No. Telepon tidak boleh kosong');
			$("#telepon").focus()
			return false;
		}
	}
</script>

<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
			<div class="panel-heading">
      <strong><?php echo $sub_subjudul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="modal-body">
        <div class="form-group input-group text-center">
          <p><strong>Silahkan input disini...</strong></p>
          <P><?php
						$info = $this->session->flashdata('info');
						if (!empty($info)) {
							echo 	$info;
						}
					?></P>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/dosen/simpan" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">NIK</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" autofocus="">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Dosen</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosen">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Jenis Kelamin</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></span>
		                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
	                      <option selected disabled>-Pilih Jenis Kelamin-</option>
	                      <option value="Laki-laki">Laki-laki</option>
	                      <option value="Perempuan">Perempuan</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Agama</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></span>
		                  <select class="form-control" name="agama" id="agama">
	                      <option selected disabled>-Pilih Agama-</option>
	                      <option value="Islam">Islam</option>
	                      <option value="Protestan">Protestan</option>
	                      <option value="Katholik">Katholik</option>
	                      <option value="Hindu">Hindu</option>
	                      <option value="Budha">Budha</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">No. Telepon</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="telepon" id="telepon" placeholder="No. Telepon">
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/dosen" type="submit" class="btn btn-warning">Tutup</a>
                  <button type="submit" class="btn btn-success">Simpan</button>
              	</div>                        
		         	</form>
		      	</div>
		    	</div>
		  	</div>
			</div>
		</div>
	</div>
</div>