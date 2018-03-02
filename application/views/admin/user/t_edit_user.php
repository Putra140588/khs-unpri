<script type="text/javascript">
	function cekform() {

		if(!$("#username").val()) {
			alert('Username tidak boleh kosong');
			$("#username").focus()
			return false;
		}

		if(!$("#password").val()) {
			alert('Password tidak boleh kosong');
			$("#password").focus()
			return false;
		}

		if(!$("#nama_user").val()) {
			alert('Nama User tidak boleh kosong');
			$("#nama_user").focus()
			return false;
		}

		if(!$("#status").val()) {
			alert('Status tidak boleh kosong');
			$("#status").focus()
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
          <p><strong>Silahkan update disini...</strong></p>
          <P><?php
						$info = $this->session->flashdata('info');
						if (!empty($info)) {
							echo 	$info;
						}
					?></P>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/user/simpanupdate" onsubmit="return cekform();">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Id User</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User"  value="<?php echo $id_user ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Username</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="username" id="username" placeholder="Username"  autofocus="" value="<?php echo $username ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Password</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama" value="<?php echo $nama_user ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Status</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-road" aria-hidden="true"></span></span>
		                  <select class="form-control" name="status" id="status">
	                      <option selected disabled><?php echo $kd_status; ?></option>
	                      <?php
	                      $status = $this->m_user->getliststatus();
	                      foreach ($status->result() as $row) {

	                      ?>
	                      <option value="<?php echo $row->kd_status; ?>"><?php echo $row->status; ?></option>
	                      <?php } ?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/user" type="submit" class="btn btn-warning">Tutup</a>
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