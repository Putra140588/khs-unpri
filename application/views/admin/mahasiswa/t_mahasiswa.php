<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
			<div class="panel-heading">
      <strong><?php echo $sub_judul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
        <p><a href="<?php echo base_url(); ?>admin/mahasiswa/tambah" type="button" class="btn btn-primary">Tambah</a></p>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No.</th>
								<th>ID</th>
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
								foreach ($data->result() as $row) {
									$fakultas 			= $this->m_mahasiswa->getfakultas($row->kd_fakultas);
									$jurusan 				= $this->m_mahasiswa->getjurusan($row->kd_jurusan);
									$kelas_program 	= $this->m_mahasiswa->getkelas_program($row->kd_kelas_program);
							?>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->id_mahasiswa; ?></td>
								<td><?php echo $row->nim; ?></td>
								<td><?php echo $row->nama_mahasiswa; ?></td>
								<td><?php echo $fakultas; ?></td>
								<td><?php echo $jurusan; ?></td>
								<td><?php echo $row->semester; ?></td>
								<td><?php echo $kelas_program; ?></td>
								<td><?php echo $row->kd_jenjang; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>admin/mahasiswa/edit/<?php echo $row->id_mahasiswa; ?>" type="button" class="btn btn-warning btn-xs">Edit</a>
                  <a href="<?php echo base_url(); ?>admin/mahasiswa/delete/<?php echo $row->id_mahasiswa; ?>" type="button" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
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