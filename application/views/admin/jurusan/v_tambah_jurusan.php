<script type="text/javascript">
	function cekform() {

		if(!$("#kd_jurusan").val()) {
			alert('Kode Jurusan tidak boleh kosong');
			$("#kd_jurusan").focus()
			return false;
		}

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
      <strong><?php echo $judul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="modal-body">
        <div class="form-group input-group text-center">         
          <P><div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div></P>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>jurusan/simpan" onsubmit="return cekform();">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Jurusan</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_jurusan" id="kd_jurusan" placeholder="Kode Jurusan" autofocus="">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Fakultas</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></span>
		                  <select class="form-control" name="kd_fakultas" id="fakultas">
	                      <option selected disabled>-Pilih Fakultas-</option>
	                      <?php	                      
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
			               	<input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Nama Jurusan">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Singkatan</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="singkatan" id="singkatan" placeholder="Singkatan">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Ketua Jurusan</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-education" aria-hidden="true"></span></span>
		                  <select class="form-control" name="id_dosen" id="id_dosen">
	                      <option selected disabled>-Pilih dosen-</option>
	                      <?php foreach ($dosen->result() as $row){
	                      
	                      	echo '<option value="'.$row->nid.'">'.$row->nid.' - '.$row->nama_dosen.'</option>';
	                      }?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Akreditasi</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="akreditasi" id="akreditasi" placeholder="Akreditasi">
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
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