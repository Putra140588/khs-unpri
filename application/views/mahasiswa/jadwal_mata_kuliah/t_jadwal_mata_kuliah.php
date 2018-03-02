<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
			<div class="panel-heading">
      <strong><?php echo $sub_judul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>KD</th>
								<th>MK</th>
								<th>SKS</th>
								<th>Dsn</th>
								<th>/J</th>
								<th>Sms</th>
								<th>Day</th>
								<th>/M</th>
								<th>/S</th>
								<th>/R</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
								$no = 1;
								foreach ($data->result() as $row) {
									$mata_kuliah 		= $this->m_jadwal_mata_kuliah->getmata_kuliah($row->kd_mata_kuliah);
									$sks 						= $this->m_jadwal_mata_kuliah->getsks_mata_kuliah($row->kd_mata_kuliah);
									$nama_dosen 		= $this->m_jadwal_mata_kuliah->getdosen($row->id_dosen);
									//$fakultas 			= $this->m_jadwal_mata_kuliah->getfakultas($row->kd_fakultas);
									$jurusan 				= $this->m_jadwal_mata_kuliah->getjurusan($row->kd_jurusan);
									//$kelas_program 	= $this->m_jadwal_mata_kuliah->getkelas_program($row->kd_kelas_program);
							?>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->kd_jadwal; ?></td>
								<td><?php echo $row->kd_mata_kuliah; ?></td>
								<td><?php echo $mata_kuliah; ?></td>
								<td><?php echo $sks; ?></td>
								<td><?php echo $nama_dosen; ?></td>
								<td><?php echo $jurusan; ?></td>
								<td><?php echo $row->semester; ?></td>
								<td><?php echo $row->hari; ?></td>
								<td><?php echo $row->waktu_mulai; ?></td>
								<td><?php echo $row->waktu_selesai; ?></td>
								<td><?php echo $row->ruang; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>