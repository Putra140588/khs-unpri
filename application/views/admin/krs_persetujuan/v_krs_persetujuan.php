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
									<th>Nama Mahasiswa</th>
									<th>Fakultas</th>
									<th>Jurusan</th>
									<th>Semester</th>
									<th>Tahun Ajaran</th>
									<th>Kelas Prog.</th>	
									<th>Status Kajur</th>
									<th>Status Dekan</th>								
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($mahasiswa->result() as $row) {
								$status1 = ($row->status_setuju_kajur == 1)? 'Disetujui' : 'Belum Disetujui';
								$label1 = ($row->status_setuju_kajur == 1)? 'label label-success' : 'label label-danger';
								$status2 = ($row->status_setuju_dekan == 1)? 'Disetujui' : 'Belum Disetujui';
								$label2 = ($row->status_setuju_dekan == 1)? 'label label-success' : 'label label-danger';
								
								//data semester dari krs
								$semesterkrs = $row->sms;
								$ket = ($semesterkrs == 0) ? 'Belum Disetujui' : $semesterkrs;?>														
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->nim; ?></td>
								<td><?php echo $row->nama_mahasiswa; ?></td>
								<td><?php echo $row->fakultas; ?></td>
								<td><?php echo $row->jurusan; ?></td>
								<td><?php echo $ket; ?></td>
								<td><?php echo $row->tahun_ajaran; ?></td>
								<td><?php echo $row->kelas_program; ?></td>
								<td><label class="<?php echo $label1?>"><?php echo $status1; ?></label></td>
								<td><label class="<?php echo $label2?>"><?php echo $status2; ?></label></td>
								<td>
								<a href="<?php echo base_url(); ?>krs_persetujuan/detail/<?php echo $row->nim.'/'.$semesterkrs.'/'.$dosen?>" type="button" class="btn btn-primary btn-xs">Detail</a>
                 				
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