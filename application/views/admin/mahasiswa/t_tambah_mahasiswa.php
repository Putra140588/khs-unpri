<script type="text/javascript">
	function cekform() {

		if(!$("#nim").val()) {
			alert('NIM tidak boleh kosong');
			$("#nim").focus()
			return false;
		}

		if(!$("#nama_mahasiswa").val()) {
			alert('Nama Mahasiswa tidak boleh kosong');
			$("#nama_mahasiswa").focus()
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

		if(!$("#fakultas").val()) {
			alert('Fakultas tidak boleh kosong');
			$("#fakultas").focus()
			return false;
		}

		if(!$("#jurusan").val()) {
			alert('Jurusan tidak boleh kosong');
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

		if(!$("#jenjang").val()) {
			alert('Jenjang tidak boleh kosong');
			$("#jenjang").focus()
			return false;
		}

		if(!$("#tahun_ajaran").val()) {
			alert('Tahun Ajaran tidak boleh kosong');
			$("#tahun_ajaran").focus()
			return false;
		}

		if(!$("#telepon").val()) {
			alert('No. Telepon tidak boleh kosong');
			$("#telepon").focus()
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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/mahasiswa/simpan" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">NIM</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" autofocus="">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Mahasiswa</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Mahasiswa">
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
	                      <option value="Laki-laki">Laki-laki</option>
	                      <option value="Perempuan">Perempuan</option>
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
	                      <option value="Islam">Islam</option>
	                      <option value="Protestan">Protestan</option>
	                      <option value="Katholik">Katholik</option>
	                      <option value="Hindu">Hindu</option>
	                      <option value="Budha">Budha</option>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Fakultas</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></span>
		                  <select class="form-control" name="fakultas" id="fakultas">
	                      <option selected disabled>-Pilih Fakultas-</option>
	                      <?php
	                      $fakultas = $this->m_mahasiswa->getlistfakultas();
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
	                      <option selected disabled>-Pilih Jurusan-</option>
	                      <?php
	                      $jurusan = $this->m_mahasiswa->getlistjurusan();
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
	                      <option selected disabled>-Pilih Semester-</option>
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
	                      <option selected disabled>-Pilih Kelas Program-</option>
	                      <?php
	                      $kelas_program = $this->m_mahasiswa->getlistkelas_program();
	                      foreach ($kelas_program->result() as $row) {

	                      ?>
	                      <option value="<?php echo $row->kd_kelas_program; ?>"><?php echo $row->kelas_program; ?></option>
	                      <?php } ?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Jenjang</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-education" aria-hidden="true"></span></span>
		                  <select class="form-control" name="jenjang" id="jenjang">
	                      <option selected disabled>-Pilih Jenjang-</option>
	                      <?php
	                      $jenjang = $this->m_mahasiswa->getlistjenjang();
	                      foreach ($jenjang->result() as $row) {

	                      ?>
	                      <option value="<?php echo $row->kd_jenjang; ?>"><?php echo $row->jenjang; ?></option>
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
	                      <option selected disabled>-Pilih Tahun Ajaran-</option>
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
			          <label class="control-label col-sm-4">No. Telepon</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="telepon" id="telepon" placeholder="No. Telepon">
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<a href="<?php echo base_url(); ?>admin/mahasiswa" type="submit" class="btn btn-warning">Tutup</a>
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