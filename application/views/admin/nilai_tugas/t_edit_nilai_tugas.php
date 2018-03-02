<script type="text/javascript">
	function cekform() {

		if(!$("#kd_krs").val()) {
			alert('Kode KRS tidak boleh kosong');
			$("#kd_krs").focus()
			return false;
		}

		if(!$("#id_dosen").val()) {
			alert('ID Dosen tidak boleh kosong');
			$("#id_dosen").focus()
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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/nilai_tugas/simpan" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Nilai Tugas</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_nilai_tugas" id="kd_nilai_tugas" placeholder="Kode Nilai Tugas" value="<?php echo $kd_nilai_tugas; ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode KRS</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_krs" id="kd_krs" placeholder="Kode KRS" value="<?php echo $kd_krs; ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">ID Dosen</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="id_dosen" id="id_dosen" placeholder="Id Dosen" autofocus="" value="<?php echo $id_dosen; ?>"> 
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nilai</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/nilai_tugas" type="submit" class="btn btn-warning">Tutup</a>
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