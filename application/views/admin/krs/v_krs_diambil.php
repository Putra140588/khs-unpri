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
									<th>NIM</th>
									<th>Tanggal Krs</th>
									<th>Semester</th>									
									<th>Tahun Ajaran</th>
									<th>Status Kajur</th>
									<th>Status Dekan</th>									
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($krs_header->result() as $row) {
								$status1 = ($row->status_setuju_kajur == 1)? 'Disetujui' : 'Belum Disetujui';
								$label1 = ($row->status_setuju_kajur == 1)? 'label label-success' : 'label label-danger';
								$status2 = ($row->status_setuju_dekan == 1)? 'Disetujui' : 'Belum Disetujui';
								$label2 = ($row->status_setuju_dekan == 1)? 'label label-success' : 'label label-danger';
								$ket = ($row->semester == 0) ? 'Belum Disetujui' : $row->semester;?>																
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->nim; ?></td>
								<td><?php echo date('d M Y',strtotime($row->tgl_krs)); ?></td>
								<td><?php echo $ket; ?></td>
								<td><?php echo $row->tahun_ajaran; ?></td>
								<td><label class="<?php echo $label1?>"><?php echo $status1; ?></label></td>
								<td><label class="<?php echo $label2?>"><?php echo $status2; ?></label></td>
								<td>
								<a href="<?php echo base_url(); ?>krs/detail/<?php echo $row->nim.'/'.$row->semester; ?>" type="button" class="btn btn-info btn-xs">Detail Krs</a>
                 				<a href="<?php echo base_url(); ?>krs/nilai_khs/<?php echo $row->nim.'/'.$row->semester; ?>" type="button" class="btn btn-warning btn-xs">Nilai KHS</a> 
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