
	       <div class="dataTable_wrapper">
	          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No.</th>	
									<th>NIM</th>
									<th>Nama</th>								
									<th>KD Mk</th>
									<th>Mata Kuliah</th>
									<th>Semester</th>
									<th>Sks</th>
									<th>Dosen</th>													
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($jadwal_mahasiswa as $row) {
								$ket = 'Krs Belum Disetujui';
								$ketnilai = 'Nilai Belum di Input';
								$lbl = 'label label-danger';
								$lblnilai = 'label label-danger';
								if ($row->keterangan > 0){
								$ket = 'Krs Sudah Disetujui';								
								$lbl = 'label label-success';}
								if ($row->keterangan_nilai > 0){
								$ketnilai='Nilai Sudah di Input';
								$lblnilai = 'label label-success';
								}?>								
																								
								<td><?php echo $no++; ?></td>	
								<td><?php echo $row->nim?></td>
								<td><?php echo $row->nama_mahasiswa?></td>							
								<td><?php echo $row->kd_mata_kuliah; ?></td>
								<td><?php echo $row->mata_kuliah; ?></td>
								<td><?php echo $row->sms; ?></td>
								<td><?php echo $row->sks; ?></td>
								<td><?php echo $row->nid.'-'.$row->nama_dosen; ?></td>	
								<td><label class="<?php echo $lbl?>"><?php echo $ket?></label> / <label class="<?php echo $lblnilai?>"><?php echo $ketnilai?></label></td>
								<td>
								<?php if ($row->keterangan == 0){?>
								<button type="button" class="btn btn-danger btn-xs" disabled>Input Nilai</button>    
								<?php }else{?>
									<a href="<?php echo base_url(); ?>jadwal_mahasiswa/input_nilai/<?php echo $row->nim.'/'.$row->kd_krs; ?>" type="button" class="btn btn-info btn-xs">Input Nilai</a>    
								<?php }?> 
								</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>