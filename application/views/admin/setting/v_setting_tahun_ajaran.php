
<div id="page-wrapper">
<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
			<div class="panel-heading">
      <strong><?php echo $judul; ?></strong>
      </div>
      <!-- /.panel-heading -->
      <div class="modal-body">
        <div class="form-group input-group text-center">        
          <P><div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div><p></P>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>setting/simpan" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">Semester</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
		                  <select class="form-control" name="semester" id="semester">
	                     
	                      <?php $sms = array('Ganjil','Genap');
	                      foreach ($sms as $row){
							$select = ($_SESSION['semester'] == $row) ? 'selected' : '';
							echo '<option value="'.$row.'" '.$select.'>'.$row.'</option>';
							}?>	                      
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Tahun Ajaran</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span></span>
		                  <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
	                      
	                      
	                     <?php $thn = array('2010/2011','2011/2012','2010/2011','2011/2012','2012/2013','2013/2014','2014/2015','2015/2016',
	                      					'2016/2017','2017/2018','2018/2019','2019/2020');
	                      					 
	                      foreach ($thn as $th){
							$select = ($_SESSION['tahun'] == $th) ? 'selected' : '';
							echo '<option value="'.$th.'" '.$select.'>'.$th.'</option>';
							}?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			         
			         
			          <div>
			          	<button type="reset" class="btn btn-info">Reset</button>
                	<button type="button" class="btn btn-warning" onclick="window.history.back()">Tutup</button>
                  <button type="submit" class="btn btn-success">Simpan</button>
              	</div>                        
		         	</form>
		      	</div>
		    	</div>
		  	</div>
			</div>
		</div>
	</div>
</div>
</div>
<script>
function get_jurusan(val)
{
	
	$.ajax ({
		url	: '<?php echo base_url('mahasiswa/show_jurusan')?>',
		type	: 'post',
		data	: 'kd_fakultas='+val,
		cache	: false,
		success	: function (param)
		{
			$("#jurusan").html(param);
		},
		error	: function (param)
		{
			alert('error show jurusan' + param);
		}
	});
}
function add_kelas(id)
{
	$.ajax ({
		url	: '<?php echo base_url('jadwal/show_kelas')?>',
		type	: 'post',
		data	: 'id='+id,
		cache	: false,
		success	: function (param)
		{
			$("#kelas").html(param);
		},
		error	: function (param)
		{
			alert('error show jurusan' + param);
		}
	});
}
</script>