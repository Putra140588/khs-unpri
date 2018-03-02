<script type="text/javascript">
	function cekform() {

		if(!$("#kd_mata_kuliah").val()) {
			alert('Kode Mata Kuliah tidak boleh kosong');
			$("#kd_mata_kuliah").focus()
			return false;
		}

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

		if(!$("#kelas").val()) {
			alert('Ruangan tidak boleh kosong');
			$("#kelas").focus()
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
          <P><div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div><p></P>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>jadwal/simpan_edit" onsubmit="return cekform();">
					 <input type="hidden" name="kd_jadwal" value="<?php echo $kd_jadwal?>">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Mata Kuliah</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="fa fa-list-alt" aria-hidden="true"></span></span>
			               	<select class="form-control" name="kd_mata_kuliah" id="kd_mata_kuliah">	                      
	                       <?php foreach ($matkul->result() as $val){
	                       $select = ($kd_mata_kuliah == $val->kd_mata_kuliah) ? 'selected' : '';
	                       	echo '<option value="'.$val->kd_mata_kuliah.'" '.$select.'>'.$val->kd_mata_kuliah.' - '.$val->mata_kuliah.'</option>';
	                       }?>
		                  </select>
			              </div>
			            </div>
			          </div>

			           <div class="form-group">
			          <label class="control-label col-sm-4">Dosen Pengajar</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-education" aria-hidden="true"></span></span>
		                  <select class="form-control" name="id_dosen" id="id_dosen">	                      
	                      <?php foreach ($dosen->result() as $row){
	                      	$select = ($id_dosen == $row->nid) ? 'selected' : '';
	                      	echo '<option value="'.$row->nid.'" '.$select.'>'.$row->nid.' - '.$row->nama_dosen.'</option>';
	                      }?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Fakultas</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></span>
		                  <select class="form-control" name="kd_fakultas" id="fakultas" onchange="get_jurusan(this.value)">
	                      
	                      <option value="all">Semua Fakultas</option>
	                     	<?php foreach ($fakultas->result() as $val){	
	                     		$select = ($kd_fakultas == $val->kd_fakultas) ? 'selected' : '';
	                     		echo '<option value="'.$val->kd_fakultas.'" '.$select.'>'.$val->fakultas.'</option>';
	                     	}?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Jurusan</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="fa fa-sitemap" aria-hidden="true"></span></span>
		                  <select class="form-control" name="kd_jurusan" id="jurusan">	                      
	                       <?php foreach ($jurusan->result() as $val){	
	                     		$select = ($kd_jurusan == $val->kd_jurusan) ? 'selected' : '';
	                     		echo '<option value="'.$val->kd_jurusan.'" '.$select.'>'.$val->jurusan.'</option>';
	                     	}?>
		                  </select>
		              	</div>
		              </div>
			          </div>
			          

			          

			         

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kelas Program</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="fa fa-briefcase" aria-hidden="true"></span></span>
		                  <select class="form-control" name="kd_kelas_program" id="kelas_program">	                     
	                      <?php	                    
	                      foreach ($kelas_program->result() as $row) {
							$select = ($kd_kelas_program == $row->kd_kelas_program) ? 'selected':'';
	                      ?>
	                      <option value="<?php echo $row->kd_kelas_program; ?>" <?php echo $select?>><?php echo $row->kelas_program; ?></option>
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
	                      
	                     <?php $thn = array('2010/2011','2011/2012','2010/2011','2011/2012','2012/2013','2013/2014','2014/2015','2015/2016',
	                      					'2016/2017','2017/2018','2018/2019','2019/2020');
	                      		
	                      foreach ($thn as $th){
							$select = ($tahun_ajaran == $th) ? 'selected':'';
							echo '<option value="'.$th.'" '.$select.'>'.$th.'</option>';
							}?>
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
	                      <?php $hr = array('Senin','Selasa','Rabu','Kamis','Jumat','Kamis','Sabtu','Minggu');
	                      foreach ($hr as $row){
							$select = array($hari == $row) ? 'selected':'';
							echo '<option value="'.$row.'">'.$row.'</option>';
							}?>
	                      
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Waktu Mulai</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="ex. 19:00" value="<?php echo $waktu_mulai?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Waktu Selesai</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="ex. 21:00" value="<?php echo $waktu_selesai?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Lokasi Kelas</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></span>
		                  <select class="form-control" name="lokasi" id="lokasi" onchange="add_kelas(this.value)">
	                     
	                      <?php foreach ($lokasi_kelas->result() as $val){
	                      	$select = ($lokasi == $val) ? 'selected':'';
	                      echo '<option value="'.$val->id_lantai.'" '.$select.'>'.$val->nama_lantai.'</option>';
	                      }?>
	                      
		                  </select>
		              	</div>
		              </div>
			          </div>
			          
			           <div class="form-group">
			          <label class="control-label col-sm-4">Kelas</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></span>
		                  <select class="form-control" name="kelas" id="kelas">	                      
	                      <?php foreach ($ruang_kelas->result() as $val){
	                      	$select = ($kelas == $val->id_kelas) ? 'selected':'';
	                      echo '<option value="'.$val->id_kelas.'" '.$select.'>'.$val->nama_kelas.'</option>';
	                      }?>
	                      
		                  </select>
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
</div>
<script>
function get_jurusan(val)
{
	
	$.ajax ({
		url	: '<?php echo base_url('mahasiswa/show_jurusan')?>',
		type	: 'post',
		data	: 'kd_fakultas='+val,
		cache	: false,
		success	: function (param)
		{
			$("#jurusan").html(param);
		},
		error	: function (param)
		{
			alert('error show jurusan' + param);
		}
	});
}
function add_kelas(id)
{
	$.ajax ({
		url	: '<?php echo base_url('jadwal/show_kelas')?>',
		type	: 'post',
		data	: 'id='+id,
		cache	: false,
		success	: function (param)
		{
			$("#kelas").html(param);
		},
		error	: function (param)
		{
			alert('error show jurusan' + param);
		}
	});
}
</script>