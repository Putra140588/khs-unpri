<div id="page-wrapper">
	<div class="row">
	  <div class="col-lg-12">
	  	<div class="panel panel-default">
				<div class="panel-heading">
	      <strong><?php echo $judul; ?></strong>
	      </div>
	      <div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div>
		      <!-- /.panel-heading -->
		      <div class="panel-body">
		        	 <div class="dataTable_wrapper">	
		        	 	<table class="table table-striped table-hover">							
							<tbody>
								<tr><td>NIM</td>
									<td>:</td>
									<td><b><?php echo $nim?></b></td>
									<td>Dosen Pengajar</td>
									<td>:</td>
									<td><b><?php echo $nid.' -'.$nama_dosen?></b></td>
								</tr>								
								<tr><td>Nama Mahasiswa</td>
									<td>:</td>
									<td><b><?php echo $nama_mahasiswa?></b></td>								
									<td>Semester / TA</td>
									<td>:</td>
									<td><b><?php echo $semester.' - '.$_SESSION['tahun']?></b></td>
								</tr>
								<tr><td>Fakultas</td>
									<td>:</td>
									<td><b><?php echo $fakultas?></b></td>								
									<td>Jurusan</td>
									<td>:</td>
									<td><b><?php echo $jurusan?></b></td>
								</tr>
								<tr><td>Mata Kuliah</td>
									<td>:</td>
									<td><b><?php echo $mata_kuliah?></b></td>								
									<td>SKS</td>
									<td>:</td>
									<td><b><?php echo $sks?></b></td>
								</tr>
								
							</tbody>
						</table>
	          				
						 <div class="modal-body">
        <div class="form-group input-group text-center">
       
           <div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div><p></P>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>jadwal_mahasiswa/simpan_nilai/<?php echo $nim?>/<?php echo $semester?>" onsubmit="return cekform();">
 					<input type="hidden" name="kd_krs" value="<?php echo $kd_krs?>">
 					<input type="hidden" name="id_dosen" value="<?php echo $this->session->userdata('id_user')?>">
 					<input type="hidden" name="sks" value="<?php echo $sks?>">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Nilai UTS</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nilai_uts" id="nilai_uts" placeholder="Nilai Uts" autofocus="" value="<?php echo $nilai_uts?>" <?php echo $disabled?>>
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nilai UAS</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="fa fa-list-alt" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nilai_uas" id="nilai_uas" placeholder="Nilai Uas" value="<?php echo $nilai_uas?>" <?php echo $disabled?>>
			              </div>
			            </div>
			          </div>

			         <div class="form-group">
			          <label class="control-label col-sm-4">Nilai Tugas</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="fa fa-list-alt" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nilai_tugas" id="nilai_tugas" placeholder="Nilai Tugas" value="<?php echo $nilai_tugas?>" <?php echo $disabled?>>
			              </div>
			            </div>
			          </div>
			          
			          <div class="form-group">
			          <label class="control-label col-sm-4">Nilai Absensi</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="fa fa-list-alt" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="nilai_absensi" id="nilai_absensi" placeholder="Nilai Absensi" value="<?php echo $nilai_absensi?>" <?php echo $disabled?>>
			              </div>
			            </div>
			          </div>

			          <div>
			          	<button type="reset" class="btn btn-info" <?php echo $disabled?>>Reset</button>
                	<button type="button" class="btn btn-warning" onclick="window.history.back()">Tutup</button>
                  <button type="submit" class="btn btn-success" <?php echo $disabled?>>Simpan</button>
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
	</div>
</div>
