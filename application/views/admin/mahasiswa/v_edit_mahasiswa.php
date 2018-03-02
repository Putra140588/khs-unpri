<div id="page-wrapper">
	<div class="row">
	  <div class="col-lg-12">
	  	<div class="panel panel-default">
				<div class="panel-heading">
	     			 <strong><?php echo $judul; ?></strong>
	     		 </div>
		      <!-- /.panel-heading -->
		      <div class="panel-body">
		        <div class="form-group input-group text-center">
          			<div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div>
          			
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url('mahasiswa/simpan_edit'); ?>" onsubmit="return cekform();">
					
			          <div class="form-group">
			          <label class="control-label col-sm-4">NIM</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" autofocus="" value="<?php echo $nim?>" readonly>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Mahasiswa</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Mahasiswa" value="<?php echo $nama_mahasiswa?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Jenis Kelamin</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></span>
		                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">	                      
	                      <?php $jk = array('Laki-Laki','Perempuan');
	                      foreach ($jk as $v){
	                      	$select = ($jenis_kelamin == $v) ? 'selected' : '';
	                      	echo '<option value="'.$v.'" '.$select.'>'.$v.'</option>';
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
		                  <?php $agm = array('Islam','Protestan','Katholik','Hindu','Budha');
		                  foreach ($agm as $r){
								$select = ($agama == $r) ? 'selected' : '';
								echo '<option value="'.$r.'" '.$select.'>'.$r.'</option>';
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
	                      <option selected disabled>-Pilih Fakultas-</option>
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
	                      <option value="<?php echo $kd_jurusan?>" selected><?php echo $jurusan?></option>
	                       
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
	                      <option selected disabled>-Pilih Kelas Program-</option>
	                     	<?php foreach ($kelas->result() as $row){
	                     	$select = ($kd_kelas_program == $row->kd_kelas_program)  ? 'selected' : '';
	                     		echo '<option value="'.$row->kd_kelas_program.'" '.$select.'>'.$row->kelas_program.'</option>';
	                     	}?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Jenjang</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-education" aria-hidden="true"></span></span>
		                  <select class="form-control" name="kd_jenjang" id="jenjang">
	                      <option selected disabled>-Pilih Jenjang-</option>
	                      <?php foreach ($jenjang->result() as $row){
	                      	$select = ($kd_jenjang == $row->kd_jenjang)  ? 'selected' : '';
	                      	echo '<option value="'.$row->kd_jenjang.'" '.$select.'>'.$row->jenjang.'</option>';
	                      }?>
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
							$select = ($tahun_ajaran == $th)  ? 'selected' : '';
							echo '<option value="'.$th.'" '.$select.'>'.$th.'</option>';
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
</script>