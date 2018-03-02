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
	        
	          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No.</th>									
									<th>Kode Status</th>
									<th>Nama Status</th>																		
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($status->result() as $row) {?>																
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->kd_status; ?></td>
								<td><?php echo $row->status; ?></td>							
								
								<td>								
                 				<a href="<?php echo base_url(); ?>akses/modul/<?php echo $row->kd_status; ?>" type="button" class="btn btn-success btn-xs">Akses</a>
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