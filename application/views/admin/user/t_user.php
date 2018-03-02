<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
			<div class="panel-heading">
      <strong><?php echo $sub_judul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
        <p><a href="<?php echo base_url(); ?>admin/user/tambah" class="btn btn-primary">Tambah</a></p>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No.</th>
								<th>Id User</th>
								<th>Username</th>
								<th>Password</th>
								<th>Nama</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
								$no = 1;
								foreach ($data->result() as $row) {
									$status = $this->m_user->getdata($row->kd_status);
							?>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->id_user; ?></td>
								<td><?php echo $row->username; ?></td>
								<td><?php echo $row->password; ?></td>
								<td><?php echo $row->nama_user; ?></td>
								<td><?php echo $status; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>admin/user/edit/<?php echo $row->id_user; ?>" class="btn btn-warning btn-xs">Edit</a>
                  <a href="<?php echo base_url(); ?>admin/user/delete/<?php echo $row->id_user; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
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