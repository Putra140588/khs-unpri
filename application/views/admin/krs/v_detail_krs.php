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
		        	 <?php $status1 = ($status_setuju_kajur == 1) ? 'Disetujui' : 'Belum Disetujui';
		        	 $label1 = ($status_setuju_kajur == 1)? 'label label-success' : 'label label-danger';
		        	 $status2 = ($status_setuju_dekan == 1) ? 'Disetujui' : 'Belum Disetujui';
		        	 $label2 = ($status_setuju_dekan == 1)? 'label label-success' : 'label label-danger';
		        	 $ket = ($semester == 0) ? 'Belum Disetujui' : $semester;?>	 			
	       				 <table class="table table-striped table-hover">							
							<tbody>
								<tr><td>NIM</td>
									<td>:</td>
									<td><b><?php echo $nim?></b></td>
									<td>Tanggal Krs</td>
									<td>:</td>
									<td><b><?php echo date('d M Y',strtotime($tgl_krs))?></b></td>
									<td>Semester</td>
									<td>:</td>
									<td><b><?php echo $ket?></b></td>
									<td>Tahun Ajaran</td>
									<td>:</td>
									<td><b><?php echo $tahun_ajaran?></b></td>
									
								</tr>								
								
							</tbody>
						</table>
	          				<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									
									<th>No.</th>									
									<th>KD Mk</th>
									<th>Mata Kuliah</th>
									<th>Sks</th>
									<th>Dosen</th>														
									<th>Jurusan</th>
									<th>Semester</th>
									<th>Program</th>
									<th>Thn Ajar</th>
									<th>Jadwal</th>									
									<th>Kelas</th>									
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($krs_detail->result() as $row) {?>								
														
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->kd_mata_kuliah; ?></td>
								<td><?php echo $row->mata_kuliah; ?></td>
								<td><?php echo $row->sks; ?></td>
								<td><?php echo $row->nid.'-'.$row->nama_dosen;?></td>	
								<td><?php echo $row->jurusan; ?></td>							
								<td><?php echo $row->semester; ?></td>	
								<td><?php echo $row->kelas_program; ?></td>	
								<td><?php echo $row->tahun_ajaran; ?></td>	
								<td><?php echo $row->hari.' / '.$row->waktu_mulai.' - '.$row->waktu_selesai?></td>	
								<td><?php echo $row->nama_lantai.' / '.$row->nama_kelas; ?></td>	
								
							</tr>
							<?php }?>
							<tr>
								<td colspan="4">Total SKS yang ditempuh :</td>
								<td colspan="7"><b><?php echo $total_sks?></b></td>
							</tr>
							<tr>
								<td colspan="4">Total SKS maksimum :</td>
								<td colspan="7"><b><?php echo $sks_recomend?></b></td>
							</tr>
							<tr>
								<td colspan="4">Status Persetujuan KRS Kajur :</td>
								<td colspan="7"><label class="<?php echo $label1?>"><?php echo $status1?></label></td>
							</tr>
							<tr>
								<td colspan="4">Status Persetujuan KRS Dekan :</td>
								<td colspan="7"><label class="<?php echo $label2?>"><?php echo $status2?></label></td>
							</tr>
							</tbody>
						</table>
						
						
						<button type="button" class="btn btn-warning" onclick="window.history.back()">Kembali</button>
						
					</div>
					
					
			  </div>
			</div>
		</div>
	</div>
</div>
