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
								<th rowspan="2">No.</th>
								<th rowspan="2">KD</th>
								<th rowspan="2">NIM</th>
								<th rowspan="2">MK</th>
								<th rowspan="2">Dosen</th>
								<th colspan="4" class="text-center">Tugas</th>
								<th rowspan="2">Nilai</th>
							</tr>
							<tr>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>4</th>
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
								<td><?php echo $row->kd_nilai_tugas; ?></td>
								<td><?php echo $row->nim; ?></td>
								<td><?php echo $row->mata_kuliah; ?></td>
								<td><?php echo $row->nama_dosen; ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td><?php echo $row->nilai; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>