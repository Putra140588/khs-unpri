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
	        <p><a href="<?php echo base_url(); ?>dosen/tambah" type="button" class="btn btn-primary">Tambah</a></p>
	          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No.</th>									
									<th>NID</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>									
									<th>Agama</th>
									<th>Telepon</th>									
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($dosen->result() as $row) {?>																
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->nid; ?></td>
								<td><?php echo $row->nama_dosen; ?></td>
								<td><?php echo $row->jenis_kelamin; ?></td>
								<td><?php echo $row->agama; ?></td>
								<td><?php echo $row->telepon; ?></td>
								
								<td>
								<a href="<?php echo base_url(); ?>dosen/edit/<?php echo $row->nid; ?>" type="button" class="btn btn-warning btn-xs">Edit</a>
                 				<a href="<?php echo base_url(); ?>dosen/delete/<?php echo $row->nid; ?>" type="button" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
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