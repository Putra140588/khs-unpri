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
								<th>KHS</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>SKS</th>
								<th>Nilai</th>
								<th>IPK</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
								$no = 1;
								foreach ($data->result() as $row) {
									$nim 						= $this->m_khs->getnimmahasiswa($row->id_mahasiswa);
									$nama_mahasiswa = $this->m_khs->getnamamahasiswa($row->id_mahasiswa);
									//$kd_fakultas 		= $this->m_krs->getfakultasmahasiswa($row->id_mahasiswa);
									//$kd_jurusan 		= $this->m_krs->getjurusanmahasiswa($row->id_mahasiswa);
									//$kd_jenjang 		= $this->m_krs->getjenjangmahasiswa($row->id_mahasiswa);
									$total_sks 			= $this->m_khs->getsks($row->kd_krs);
							?>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->kd_khs; ?></td>
								<td><?php echo $nim; ?></td>
								<td><?php echo $nama_mahasiswa; ?></td>
								<td><?php echo $total_sks; ?></td>
								<td></td>
								<td><?php echo $row->ips; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>