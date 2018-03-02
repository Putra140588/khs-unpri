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
		        <form class="form-horizontal" method="post" action="<?php echo base_url('krs/simpan'); ?>" onsubmit="return cekform();">
	       		 <table class="table table-striped table-hover">							
							<tbody>
								<tr><td>NIM</td>
									<td>:</td>
									<td><b><?php echo $nim?></b></td>
									<td>Ketua Fakultas</td>
									<td>:</td>
									<td><b><?php echo $nama_dosen?></b></td>
								</tr>								
								<tr><td>Nama</td>
									<td>:</td>
									<td><b><?php echo $nama_mahasiswa?></b></td>
									<td>Semester / TA</td>
									<td>:</td>
									<td><b><?php echo $sms.' ('.$_SESSION['semester'].') - '.$_SESSION['tahun']?></b></td>
									
								</tr>
								<tr><td>Fakultas</td>
									<td>:</td>
									<td><b><?php echo $fakultas?></b></td>
									<td>Kelas Program</td>
									<td>:</td>
									<td><b><?php echo $kelas_program?></b></td>
								</tr>
								<tr><td>Jurusan</td>
									<td>:</td>
									<td><b><?php echo $jurusan?></b></td>
									<td>Semester Akan Ditempuh</td>
									<td>:</td>
									<td><b><?php echo $sms?></b></td>
								</tr>
							</tbody>
						</table>
	          				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>*</th>
									<th>No.</th>									
									<th>KD Mk</th>
									<th>Mata Kuliah</th>
									<th>Sks</th>
									<th>Dosen</th>														
									<th>Jurusan</th>
									<th>Semester</th>
									<th>Program</th>
									<th>Thn Ajar</th>
									<th>Jadwal</th>									
									<th>Kelas</th>									
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($krs->result() as $row) {
								if ($row->kd_kelas_program == $kd_kelas_program){?>	
								<td><input type="checkbox" name="check[]" id="chksks<?php echo $row->kd_jadwal?>" value="<?php echo $row->kd_jadwal.'-'.$semester.'-'.$_SESSION['tahun']?>" onchange="getsks(this,<?php echo $row->sks?>,<?php echo $row->kd_jadwal?>)">															
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->kd_mata_kuliah; ?></td>
								<td><?php echo $row->mata_kuliah; ?></td>
								<td><?php echo $row->sks; ?></td>
								<td><?php echo $row->nid.'-'.$row->nama_dosen; ?></td>	
								<td><?php echo $row->jurusan; ?></td>							
								<td><?php echo $row->semester; ?></td>	
								<td><?php echo $row->kelas_program; ?></td>	
								<td><?php echo $row->tahun_ajaran; ?></td>	
								<td><?php echo $row->hari.' / '.$row->waktu_mulai.' - '.$row->waktu_selesai?></td>	
								<td><?php echo $row->nama_lantai.' / '.$row->nama_kelas; ?></td>	
								
							</tr>
							<?php } 
							}?>
							</tbody>
						</table>
						
						<div style="margin-top:20px; font-size:17px;" >Total SKS yang ditempuh : <span id="getsks">0</span></div>
						<div style="margin-top:5px;margin-bottom : 20px; font-size:17px;" >Total SKS maksimum : <span id="sksrecomend"><?php echo $sks_recomend?></span></div>
						<button type="submit" class="btn btn-primary">Simpan</button>
						</form>
					</div>
					
					
			  </div>
			</div>
		</div>
	</div>
</div>
<script>
function getsks(obj,val,kd)
{
	
	var sks_recomend = $("#sksrecomend").html();
	
	if (obj.checked)
	{
		var code='tambah';
	}
	else
	{
		var code='kurang';
	}
	$.ajax({
		url 	: '<?php echo base_url('krs/get_sks')?>',
		type	: 'post',
		data	: 'val='+val+'&code='+code+'&sks_recomend='+sks_recomend,
		cache	: false,
		success	: function (param)
		{
			var json = eval('('+param+')');
			if (json.error == 1)
			{
				alert(json.ket);
				$("#chksks"+kd).attr('checked',false);
				
			}
			else
			{
				$("#getsks").html(json.total_sks);
			}
			
		},
		error	: function (param)
		{
			alert('gagal hitung sks');
		}
	});
}
</script>