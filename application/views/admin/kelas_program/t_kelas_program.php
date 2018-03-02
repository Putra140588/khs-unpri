<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
			<div class="panel-heading">
      <strong><?php echo $sub_judul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
        <p><a href="<?php echo base_url(); ?>admin/kelas_program/tambah" type="button" class="btn btn-primary">Tambah</a></p>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No.</th>
								<th>Kode</th>
								<th>Kelas Program</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
								$no = 1;
								foreach ($data->result() as $row) {
							?>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->kd_kelas_program; ?></td>
								<td><?php echo $row->kelas_program; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>admin/kelas_program/edit/<?php echo $row->kd_kelas_program; ?>" type="button" class="btn btn-warning btn-xs">Edit</a>
                  <a href="<?php echo base_url(); ?>admin/kelas_program/delete/<?php echo $row->kd_kelas_program; ?>" type="button" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
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