<script type="text/javascript">
	function cekform() {
		if(!$("#kd_mutu").val()) {
			alert('Kode Mutu tidak boleh kosong');
			$("#kd_mutu").focus()
			return false;
		}

		if(!$("#simbol_mutu").val()) {
			alert('Simbol Mutu tidak boleh kosong');
			$("#simbol_mutu").focus()
			return false;
		}

		if(!$("#angka_mutu").val()) {
			alert('Angka Mutu tidak boleh kosong');
			$("#angka_mutu").focus()
			return false;
		}

		if(!$("#huruf_mutu").val()) {
			alert('Huruf Mutu tidak boleh kosong');
			$("#huruf_mutu").focus()
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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/mutu/simpan" onsubmit="return cekform();">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Mutu</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_mutu" id="kd_mutu" placeholder="Kode Mutu" autofocus="">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Simbol Mutu</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-export" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="simbol_mutu" id="simbol_mutu" placeholder="Simbol Mutu ex. A, B+, etc">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Angka Mutu</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="angka_mutu" id="angka_mutu" placeholder="Angka Mutu">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Huruf Mutu</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="huruf_mutu" id="huruf_mutu" placeholder="Huruf Mutu">
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/mutu" type="submit" class="btn btn-warning">Tutup</a>
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