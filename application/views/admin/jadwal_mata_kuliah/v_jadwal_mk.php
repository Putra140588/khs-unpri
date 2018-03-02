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
	        <p><a href="<?php echo base_url(); ?>jadwal/tambah" type="button" class="btn btn-primary">Tambah</a></p>
	          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($jadwal->result() as $row) {?>																
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->kd_mata_kuliah; ?></td>
								<td><?php echo $row->mata_kuliah; ?></td>
								<td><?php echo $row->sks; ?></td>
								<td><?php echo $row->nid.'-'.$row->nama_dosen; ?></td>	
								<td><?php echo $row->jurusan; ?></td>							
								<td><?php echo $row->semester; ?></td>	
								<td><?php echo $row->kelas_program; ?></td>	
								<td><?php echo $row->tahun_ajaran; ?></td>	
								<td><?php echo $row->hari.' / '.$row->waktu_mulai.' - '.$row->waktu_selesai?></td>	
								<td><?php echo $row->nama_lantai.' / '.$row->nama_kelas; ?></td>	
								<td>
								<a href="<?php echo base_url(); ?>jadwal/edit/<?php echo $row->kd_jadwal; ?>" type="button" class="btn btn-warning btn-xs">Edit</a>
                 				<a href="<?php echo base_url(); ?>jadwal/delete/<?php echo $row->kd_jadwal; ?>" type="button" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
								</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
			  </div>
			</div>
		</div>
	</div>
</div>