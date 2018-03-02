<script type="text/javascript">
	function cekform() {

		if(!$("#id_dosen").val()) {
			alert('ID Dosen Pengajar tidak boleh kosong');
			$("#id_dosen").focus()
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

		if(!$("#semester").val()) {
			alert('Semester tidak boleh kosong');
			$("#semester").focus()
			return false;
		}

		if(!$("#kelas_program").val()) {
			alert('Kelas Program tidak boleh kosong');
			$("#kelas_program").focus()
			return false;
		}

		if(!$("#tahun_ajaran").val()) {
			alert('Tahun Ajaran tidak boleh kosong');
			$("#tahun_ajaran").focus()
			return false;
		}

		if(!$("#hari").val()) {
			alert('Hari tidak boleh kosong');
			$("#hari").focus()
			return false;
		}

		if(!$("#waktu_mulai").val()) {
			alert('Waktu Mulai tidak boleh kosong');
			$("#waktu_mulai").focus()
			return false;
		}

		if(!$("#waktu_selesai").val()) {
			alert('Waktu Selesai tidak boleh kosong');
			$("#waktu_selesai").focus()
			return false;
		}

		if(!$("#ruang").val()) {
			alert('Ruangan tidak boleh kosong');
			$("#ruang").focus()
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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/jadwal_mata_kuliah/simpanupdate" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Jadwal</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_jadwal" id="kd_jadwal" placeholder="Kode Jadwal Mata Kuliah is automatic insert" value="<?php echo $kd_jadwal; ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Mata Kuliah</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="fa fa-list-alt" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_mata_kuliah" id="kd_mata_kuliah" placeholder="Kode Mata Kuliah" value="<?php echo $kd_mata_kuliah; ?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">ID Dosen Pengajar</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="id_dosen" id="id_dosen" placeholder="ID Dosen Pengajar" value="<?php echo $id_dosen; ?>" autofocus="">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Fakultas</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></span>
		                  <select class="form-control" name="fakultas" id="fakultas">
	                      <option selected disabled><?php echo $kd_fakultas; ?></option>
	                      <?php
	                      $fakultas = $this->m_jadwal_mata_kuliah->getlistfakultas();
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
		                  <select class="form-control" name="jurusan" id="jurusan">
	                      <option selected disabled><?php echo $kd_jurusan; ?></option>
	                      <?php
	                      $jurusan = $this->m_jadwal_mata_kuliah->getlistjurusan();
	                      foreach ($jurusan->result() as $row) {

	                      ?>
	                      <option value="<?php echo $row->kd_jurusan; ?>"><?php echo $row->jurusan; ?></option>
	                      <?php } ?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Semester</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
		                  <select class="form-control" name="semester" id="semester">
	                      <option selected disabled><?php echo $semester; ?></option>
	                      <option value="1">1</option>
	                      <option value="2">2</option>
	                      <option value="3">3</option>
	                      <option value="4">4</option>
	                      <option value="5">5</option>
	                      <option value="6">6</option>
	                      <option value="7">7</option>
	                      <option value="8">8</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kelas Program</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="fa fa-briefcase" aria-hidden="true"></span></span>
		                  <select class="form-control" name="kelas_program" id="kelas_program">
	                      <option selected disabled><?php echo $kd_kelas_program; ?></option>
	                      <?php
	                      $kelas_program = $this->m_jadwal_mata_kuliah->getlistkelas_program();
	                      foreach ($kelas_program->result() as $row) {

	                      ?>
	                      <option value="<?php echo $row->kd_kelas_program; ?>"><?php echo $row->kelas_program; ?></option>
	                      <?php } ?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Tahun Ajaran</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span></span>
		                  <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
	                      <option selected disabled><?php echo $tahun_ajaran; ?></option>
	                      <option value="2010/2011">2010/2011</option>
	                      <option value="2011/2012">2011/2012</option>
	                      <option value="2012/2013">2012/2013</option>
	                      <option value="2013/2014">2013/2014</option>
	                      <option value="2014/2015">2014/2015</option>
	                      <option value="2015/2016">2015/2016</option>
	                      <option value="2016/2017">2016/2017</option>
	                      <option value="2017/2018">2017/2018</option>
	                      <option value="2018/2019">2018/2019</option>
	                      <option value="2019/2020">2019/2020</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Hari</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span></span>
		                  <select class="form-control" name="hari" id="hari">
	                      <option selected disabled><?php echo $hari; ?></option>
	                      <option value="Senin">Senin</option>
	                      <option value="Selasa">Selasa</option>
	                      <option value="Rabu">Rabu</option>
	                      <option value="Kamis">Kamis</option>
	                      <option value="Jum'at">Jum'at</option>
	                      <option value="Sabtu">Sabtu</option>
	                      <option value="Minggu">Minggu</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Waktu Mulai</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="ex. 19:00" value="<?php echo $waktu_mulai; ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Waktu Selesai</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="ex. 21:00" value="<?php echo $waktu_selesai; ?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Ruangan</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></span>
		                  <select class="form-control" name="ruang" id="ruang">
	                      <option selected disabled><?php echo $ruang; ?></option>
	                      <optgroup label="Lantai 1">
	                      	<option>1.1</option>
	                      	<option>1.2</option>
	                      	<option>1.3</option>
	                      	<option>1.4</option>
	                      </optgroup>
	                      <optgroup label="Lantai 2">
	                      	<option>2.1</option>
	                      	<option>2.2</option>
	                      	<option>2.3</option>
	                      	<option>2.4</option>
	                      </optgroup>
	                      <optgroup label="Lantai 3">
	                      	<option>3.1</option>
	                      	<option>3.2</option>
	                      	<option>3.3</option>
	                      	<option>3.4</option>
	                      </optgroup>
	                      <optgroup label="Lantai 4">
	                      	<option>4.1</option>
	                      	<option>4.2</option>
	                      	<option>4.3</option>
	                      	<option>4.4</option>
	                      </optgroup>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/jadwal_mata_kuliah" type="submit" class="btn btn-warning">Tutup</a>
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