<script type="text/javascript">
	function cekform() {

		if(!$("#jumlah_pertemuan").val()) {
			alert('Silahkan masukan jumlah pertemuan');
			$("#jumlah_pertemuan").focus()
			return false;
		}

		if(!$("#jumlah_kehadiran").val()) {
			alert('Silahkan masukan jumlah kehadiran mahasiswa');
			$("#jumlah_kehadiran").focus()
			return false;
		}

		if(!$("#nilai").val()) {
			alert('Silahkan masukan nilai mahasiswa');
			$("#nilai").focus()
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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>dosen/nilai_absensi/simpanupdate" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Nilai Absensi</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_nilai_absensi" id="kd_nilai_absensi" placeholder="Kode Nilai Absensi" value="<?php echo $kd_nilai_absensi; ?>" readonly>
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
			               	<input type="text" class="form-control" name="id_dosen" id="id_dosen" placeholder="Id Dosen" value="<?php echo $id_dosen; ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Jumlah Pertemuan</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>
		                  <select class="form-control" name="jumlah_pertemuan" id="jumlah_pertemuan" autofocus="">
	                      <option selected disabled>-Pilih Jumlah Pertemuan-</option>
	                      <option value="1">1</option>
	                      <option value="2">2</option>
	                      <option value="3">3</option>
	                      <option value="4">4</option>
	                      <option value="5">5</option>
	                      <option value="6">6</option>
	                      <option value="7">7</option>
	                      <option value="8">8</option>
	                      <option value="9">9</option>
	                      <option value="10">10</option>
	                      <option value="11">11</option>
	                      <option value="12">12</option>
	                      <option value="13">13</option>
	                      <option value="14">14</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Jumlah Kehadiran</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span></span>
		                  <select class="form-control" name="jumlah_kehadiran" id="jumlah_kehadiran">
	                      <option selected disabled>-Pilih Jumlah Kehadiran-</option>
	                      <option value="1">1</option>
	                      <option value="2">2</option>
	                      <option value="3">3</option>
	                      <option value="4">4</option>
	                      <option value="5">5</option>
	                      <option value="6">6</option>
	                      <option value="7">7</option>
	                      <option value="8">8</option>
	                      <option value="9">9</option>
	                      <option value="10">10</option>
	                      <option value="11">11</option>
	                      <option value="12">12</option>
	                      <option value="13">13</option>
	                      <option value="14">14</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nilai</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai">
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>dosen/nilai_absensi" type="submit" class="btn btn-warning">Tutup</a>
                  <button type="submit" class="btn btn-success">Input</button>
              	</div>                        
		         	</form>
		      	</div>
		    	</div>
		  	</div>
			</div>
		</div>
	</div>
</div>