<script type="text/javascript">
	function cekform() {

		if(!$("#nik").val()) {
			alert('NIK tidak boleh kosong');
			$("#nik").focus()
			return false;
		}

		if(!$("#nama_admin").val()) {
			alert('Nama Admintidak boleh kosong');
			$("#nama_admin").focus()
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
		if(!$("#kd_status").val()) {
			alert('Status tidak boleh kosong');
			$("#kd_status").focus()
			return false;
		}
	}
</script>
<div id="page-wrapper">
<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
			<div class="panel-heading">
      <strong><?php echo $judul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="modal-body">
        <div class="form-group input-group text-center">
          <div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/simpan_edit" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">NIK</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" autofocus="" value="<?php echo $nik?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Admin</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nama_admin" id="nama_admin" placeholder="Nama Admin" value="<?php echo $nama_admin?>">
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
	                      <?php $jk = array('Laki-Laki','Perempuan');
	                      foreach ($jk as $val){
							$select = ($jenis_kelamin == $val) ? 'selected' : '';
							echo '<option value="'.$val.'" '.$select.'>'.$val.'</option>';
							}?>
	                     
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
	                       <?php $agm = array('Islam','Protestan','Katholik','Hindu','Budha');
	                     	 foreach ($agm as $val){
							$select = ($agama == $val) ? 'selected' : '';										
							echo '<option value="'.$val.'" '.$select.'>'.$val.'</option>';
							}?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">No. Telepon</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="telepon" id="telepon" placeholder="No. Telepon" value="<?php echo $telepon?>">
			              </div>
			            </div>
			          </div>
			          
			          <div class="form-group">
			          <label class="control-label col-sm-4">Status</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-education" aria-hidden="true"></span></span>
		                  <select class="form-control" name="kd_status" id="kd_status">
	                      <option selected disabled>-Pilih status-</option>
	                      <?php foreach ($status->result() as $row){
	                      	$select = ($kd_status == $row->kd_status) ? 'selected' : '';
	                      	echo '<option value="'.$row->kd_status.'" '.$select.'>'.$row->status.'</option>';
	                      }?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div>
			          	
                	<button type="button" class="btn btn-warning" onclick="window.history.back()">Tutup</button>
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
</div>