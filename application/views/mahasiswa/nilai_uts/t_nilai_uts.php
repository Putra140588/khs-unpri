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
								<th>Kode</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>Mata Kuliah</th>
								<th>Dosen</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
								$no = 1;
								foreach ($data->result() as $row) {
							?>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->kd_nilai_uts; ?></td>
								<td><?php echo $row->nim; ?></td>
								<td><?php echo $row->nama_mahasiswa; ?></td>
								<td><?php echo $row->mata_kuliah; ?></td>
								<td><?php echo $row->nama_dosen; ?></td>
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