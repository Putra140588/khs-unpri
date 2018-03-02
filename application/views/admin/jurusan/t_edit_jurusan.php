<script type="text/javascript">
	function cekform() {

		if(!$("#fakultas").val()) {
			alert('Nama Fakultas tidak boleh kosong');
			$("#fakultas").focus()
			return false;
		}

		if(!$("#jurusan").val()) {
			alert('Nama Jurusan tidak boleh kosong');
			$("#jurusan").focus()
			return false;
		}

		if(!$("#singkatan").val()) {
			alert('Singkatan tidak boleh kosong');
			$("#singkatan").focus()
			return false;
		}

		if(!$("#id_dosen").val()) {
			alert('ID Ketua Jurusan tidak boleh kosong');
			$("#id_dosen").focus()
			return false;
		}

		if(!$("#akreditasi").val()) {
			alert('Akreditasi tidak boleh kosong');
			$("#akreditasi").focus()
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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/jurusan/simpanupdate" onsubmit="return cekform();">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Jurusan</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_jurusan" id="kd_jurusan" placeholder="Kode Jurusan" value="<?php echo $kd_jurusan; ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Fakultas</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></span>
		                  <select class="form-control" name="fakultas" id="fakultas"  autofocus="">
	                      <option selected disabled><?php echo $kd_fakultas; ?></option>
	                      <?php
	                      $fakultas = $this->m_jurusan->getlistfakultas();
	                      foreach ($fakultas->result() as $row) {

	                      ?>
	                      <option value="<?php echo $row->kd_fakultas; ?>"><?php echo $row->fakultas; ?></option>
	                      <?php } ?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Jurusan</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="fa fa-sitemap" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Nama Jurusan" value="<?php echo $jurusan; ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Singkatan</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="singkatan" id="singkatan" placeholder="Singkatan" value="<?php echo $singkatan; ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">ID Ketua Jurusan</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="id_dosen" id="id_dosen" placeholder="ID Ketua Jurusan" value="<?php echo $id_dosen; ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Akreditasi</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="akreditasi" id="akreditasi" placeholder="Akreditasi" value="<?php echo $akreditasi; ?>">
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/jurusan" type="submit" class="btn btn-warning">Tutup</a>
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