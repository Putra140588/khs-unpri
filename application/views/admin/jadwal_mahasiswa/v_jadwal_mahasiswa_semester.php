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
		        	
	       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>jadwal/simpan" onsubmit="return cekform();">

			           <div class="form-group">
			          <label class="control-label col-sm-4">Pilih Semester</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></span>
		                  <select class="form-control" name="semester" id="semester" onchange="showjadwal(this.value)">
	                      <option selected disabled>-Pilih Semester-</option>
	                      <?php $sms = array('1','2','3','4','5','6','7 ','8');
	                      foreach ($sms as $val){
								echo '<option value="'.$val.'">'.$val.'</option>';
						  }?>	                      
		                  </select>
		              	</div>
		              </div>
			          </div>
			        </form>
	         
					
					<div id="jadwal_mahasiswa"></div>
			  </div>
			</div>
		</div>
	</div>
</div>
<script>
function showjadwal(val)
{
	$.ajax ({
		url	: '<?php echo base_url('jadwal_mahasiswa/show_jadwal')?>',
		type	: 'post',
		data	:'val='+val,
		cache	: false,
		success	: function (param)
		{
			$("#jadwal_mahasiswa").html(param);
		},
		error	: function (param)
		{
			alert(param);
		}
	});
}

</script>