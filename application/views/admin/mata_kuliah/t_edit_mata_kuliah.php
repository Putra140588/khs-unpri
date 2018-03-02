<script type="text/javascript">
	function cekform() {

		if(!$("#mata_kuliah").val()) {
			alert('Nama Mata Kuliah tidak boleh kosong');
			$("#mata_kuliah").focus()
			return false;
		}

		if(!$("#sks").val()) {
			alert('Jumlah SKS tidak boleh kosong');
			$("#sks").focus()
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
          <p><strong>Silahkan Update disini...</strong></p>
          <P><?php
						$info = $this->session->flashdata('info');
						if (!empty($info)) {
							echo 	$info;
						}
					?></P>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/mata_kuliah/simpanupdate" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Mata Kuliah</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_mata_kuliah" id="kd_mata_kuliah" placeholder="Kode Mata Kuliah" value="<?php echo $kd_mata_kuliah; ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Mata Kuliah</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="fa fa-list-alt" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="mata_kuliah" id="mata_kuliah" placeholder="Nama Mata Kuliah" autofocus="" value="<?php echo $mata_kuliah; ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Jumlah SKS</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></span>
		                  <select class="form-control" name="sks" id="sks">
	                      <option selected disabled><?php echo $sks; ?></option>
	                      <option value="1">1</option>
	                      <option value="2">2</option>
	                      <option value="3">3</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/mata_kuliah" type="submit" class="btn btn-warning">Tutup</a>
                  <button type="submit" class="btn btn-success">Update</button>
              	</div>                        
		         	</form>
		      	</div>
		    	</div>
		  	</div>
			</div>
		</div>
	</div>
</div>