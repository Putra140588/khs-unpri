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
	        <p><a href="<?php echo base_url(); ?>mahasiswa/tambah" type="button" class="btn btn-primary">Tambah</a></p>
	          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No.</th>									
									<th>NIM</th>
									<th>Nama</th>
									<th>Fakultas</th>
									<th>Jurusan</th>
									<th>Smt</th>
									<th>Kelas Prog.</th>
									<th>Jenjang</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($mahasiswa->result() as $row) {
								$ket =  ($row->semester == 0) ? 'Belum Disetujui' : $row->semester;?>																
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->nim; ?></td>
								<td><?php echo $row->nama_mahasiswa; ?></td>
								<td><?php echo $row->fakultas; ?></td>
								<td><?php echo $row->jurusan; ?></td>
								<td><?php echo $ket ?></td>
								<td><?php echo $row->kelas_program; ?></td>
								<td><?php echo $row->kd_jenjang; ?></td>
								<td>
								<a href="<?php echo base_url(); ?>mahasiswa/edit/<?php echo $row->nim; ?>" type="button" class="btn btn-warning btn-xs">Edit</a>
                 				<a href="<?php echo base_url(); ?>mahasiswa/delete/<?php echo $row->nim; ?>" type="button" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
                 				
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