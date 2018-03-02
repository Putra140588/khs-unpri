<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
			<div class="panel-heading">
      <strong><?php echo $sub_judul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
        <p><a href="<?php echo base_url(); ?>admin/nilai_absensi/tambah" type="button" class="btn btn-primary">Tambah</a></p>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No.</th>
								<th>KD</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>MK</th>
								<th>Dosen</th>
								<th>Day</th>
								<th>In</th>
								<th>Nilai</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
								$no = 1;
								foreach ($data->result() as $row) {
									//$id_mahasiswa = $this->m_nilai_absensi->getmahasiswa($row->kd_krs);
									//$kd_mata_kuliah = $this->m_nilai_absensi->getmatakuliah($row->kd_krs);
							?>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->kd_nilai_absensi; ?></td>
								<td><?php echo $row->nim; ?></td>
								<td><?php echo $row->nama_mahasiswa; ?></td>
								<td><?php echo $row->mata_kuliah; ?></td>
								<td><?php echo $row->nama_dosen; ?></td>
								<td><?php echo $row->jumlah_pertemuan; ?></td>
								<td><?php echo $row->jumlah_kehadiran; ?></td>
								<td><?php echo $row->nilai; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>admin/nilai_absensi/edit/<?php echo $row->kd_nilai_absensi; ?>" type="button" class="btn btn-warning btn-xs">Edit</a>
                  <a href="<?php echo base_url(); ?>admin/nilai_absensi/delete/<?php echo $row->kd_nilai_absensi; ?>" type="button" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
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