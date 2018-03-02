<script type="text/javascript">
	function cekform() {

		if(!$("#kd_kelas_program").val()) {
			alert('Kode Kelas Program tidak boleh kosong');
			$("#kd_kelas_program").focus()
			return false;
		}

		if(!$("#kelas_program").val()) {
			alert('Nama Kelas Program tidak boleh kosong');
			$("#kelas_program").focus()
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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/kelas_program/simpan" onsubmit="return cekform();">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Kelas Program</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_kelas_program" id="kd_kelas_program" placeholder="Kode Kelas Program" autofocus="">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Kelas Program</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kelas_program" id="kelas_program" placeholder="Nama Kelas Program">
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/kelas_program" type="submit" class="btn btn-warning">Tutup</a>
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