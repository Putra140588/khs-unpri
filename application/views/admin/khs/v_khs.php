<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url(); ?>assets/images/favicon.ico">
    <title>Universitas Pramita Indonesia</title>
	<style type="text/css">
	
	</style>
	    <!-- Bootstrap Core CSS -->
	     <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/custom.css" rel="stylesheet">
	
	   
    

</head>

<body>

<div id="wrapper">
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          	<button type="button" class="btn btn-warning btn-x"  onclick="window.history.back()" style="margin-top:10px; margin-left:20px">Kembali</button>
            <button type="button" class="btn btn-success btn-x"  onclick="window:print()" style="margin-top:10px; margin-left:5px">Print</button>
        </div>
        <!-- /.navbar-header -->
     
    </nav>
<div class="panel-body">
<div style="font-size: 14px; margin-left:20px;font-weight:bold">UNIVERSITAS PRAMITA INDONESIA</div>
<div style="font-size : 14px;margin-left:75px; font-weight:bold">FAKULTAS <?php echo strtoupper($fakultas)?></div>
<hr>
<div style="text-align: center; font-size: 16px;font-weight:bold">KARTU HASIL STUDI MAHASISWA</div>

		<table class="table" style="width:500px; margin-left:20px; margin-top:20px;font-size:15px;" >
				<tbody>
					<tr>	
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $nama_mahasiswa?></td>
						
					</tr>
					<tr>	
						<td>NIM</td>
						<td>:</td>
						<td><?php echo $nim?></td>
						
					</tr>
					<tr>	
						<td>Fakultas</td>
						<td>:</td>
						<td><?php echo $fakultas?></td>
						
					</tr>
					<tr>	
						<td>Jurusan</td>
						<td>:</td>
						<td><?php echo $jurusan?></td>
						
					</tr>
					<tr>	
						<td>Jenjang</td>
						<td>:</td>
						<td><?php echo $kd_jenjang.' - '.$jenjang?></td>
						
					</tr>
					<tr>	
						<td>Semester / TA</td>
						<td>:</td>
						<td><?php echo $semester.' - '.$tahun_ajaran?></td>
						
					</tr>
				</tbody>
		</table>
	
<div class="dataTable_wrapper">
		<table class="table table-striped table-bordered table-hover" >
							<thead>
								<tr >
									<th style="text-align: center" rowspan=2>No.</th>									
									<th style="text-align: center" rowspan=2>KODE MK</th>
									<th style="text-align: center" rowspan=2>MATA KULIAH</th>
									<th colspan="4"  style="text-align: center">PRESTASI</th>	
																							
																							
								</tr>
								<tr >
									<th style="text-align: center; width : 100px">HM</th>									
									<th style="text-align: center; width : 100px" >AM</th>
									<th style="text-align: center; width : 100px" >K</th>
									<th  style="text-align: center; width : 100px">NM</th>	
																							
																							
								</tr>
								
								
							</thead>
							<tbody>
							<?php $no=1;foreach ($datakrs->result() as $row){
													
								echo '<tr>
										<td style="text-align:center">'.$no.'</td>
										<td style="text-align:center">'.$row->kd_mata_kuliah.'</td>
										<td>'.$row->mata_kuliah.'</td>
										<td style="text-align:center">'.$row->huruf_mutu.'</td>
										<td style="text-align:center">'.$row->bobot.'</td>
										<td style="text-align:center">'.$row->sks.'</td>
										<td style="text-align:center">'.$row->nilai_mutu.'</td>
								</tr>';
								
							$no++;}?>
							
							<tr>
								<td colspan=3>Jumlah</td>
								<td></td>
								<td></td>
								<td style="text-align:center"><?php echo $total_sks?></td>
								<td style="text-align:center"><?php echo $total_nm?></td>
							</tr>
							<tr>
															
								<td colspan=6 style="text-align: right"><b>Indeks Prestasi Semester</b></td>
								<td style="text-align:center"><?php echo $total_ipk?></td>
							</tr>
							<tr>
															
								<td colspan=6 style="text-align: right"><b>Kredit Maksimum Semester <?php echo $semester  + 1?></b></td>
								<td style="text-align:center"><?php echo $sks_recomend?></td>
							</tr>
							<tr>
														
								<td colspan=6 style="text-align: right">Total SKS Yang Wajib Ditempuh </td>
								<td style="text-align:center"><?php echo $total_sks_all?></td>
							</tr>
							<tr>
															
								<td colspan=6 style="text-align: right">SKS Yang Sudah Diambil</td>
								<td style="text-align:center"><?php echo $sks_diambil?></td>
							</tr>
							<tr>
															
								<td colspan=6 style="text-align: right">SKS Yang Belum Diambil</td>
								<td style="text-align:center"><?php echo $sks_last?></td>
							</tr>
							<tr>
															
								<td colspan=6 style="text-align: right">Index Prestasi Kumulatif</td>
								<td style="text-align:center"><?php echo $total_ipk?></td>
							</tr>
							
							
							</tbody>
						</table>
						</div>
						</div>
 </div>

</body>

</html>
