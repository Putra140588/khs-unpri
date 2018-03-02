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
	        <p><a href="<?php echo base_url(); ?>fakultas/tambah" type="button" class="btn btn-primary">Tambah</a></p>
	          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No.</th>									
									<th>KD Fakultas</th>
									<th>Nama Fakultas</th>
									<th>Ketua Fakultas</th>															
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($fakultas->result() as $row) {?>																
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->kd_fakultas; ?></td>
								<td><?php echo $row->fakultas; ?></td>
								<td><?php echo $row->nama_dosen; ?></td>								
								
								<td>
								<a href="<?php echo base_url(); ?>fakultas/edit/<?php echo $row->kd_fakultas; ?>" type="button" class="btn btn-warning btn-xs">Edit</a>
                 				<a href="<?php echo base_url(); ?>fakultas/delete/<?php echo $row->kd_fakultas; ?>" type="button" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
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