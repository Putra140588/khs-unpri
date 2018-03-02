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
								<th>No.</th>
								<th>KRS</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>Mata Kuliah</th>
								<th>SKS</th>
								<th>/S</th>
								<th>T/A</th>
								<th>Tot.</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
								$no = 1;
								foreach ($data->result() as $row) {
									$nim 						= $this->m_krs->getnimmahasiswa($row->id_mahasiswa);
									$nama_mahasiswa = $this->m_krs->getnamamahasiswa($row->id_mahasiswa);
									//$kd_fakultas 		= $this->m_krs->getfakultasmahasiswa($row->id_mahasiswa);
									//$kd_jurusan 		= $this->m_krs->getjurusanmahasiswa($row->id_mahasiswa);
									//$kd_jenjang 		= $this->m_krs->getjenjangmahasiswa($row->id_mahasiswa);
									$sks 		= $this->m_krs->getsks($row->kd_mata_kuliah);
									$mata_kuliah 		= $this->m_krs->getmatakuliah($row->kd_mata_kuliah);
							?>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->kd_krs; ?></td>
								<td><?php echo $nim; ?></td>
								<td><?php echo $nama_mahasiswa; ?></td>
								<td><?php echo $mata_kuliah; ?></td>
								<td><?php echo $sks; ?></td>
								<td><?php echo $row->semester; ?></td>
								<td><?php echo $row->tahun_ajaran; ?></td>
								<td><?php echo $row->total_sks; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>