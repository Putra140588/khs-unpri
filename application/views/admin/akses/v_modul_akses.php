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
	        <p><button type="button" onclick="window.history.back()" class="btn btn-warning">Kembali</button></p>
	          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr><th><input type="checkbox" id="<?php echo $kd_status?>" onclick="checkrowall(this,this.id)"></th>
									<th>No.</th>									
									<th>Kode Status</th>
									<th>Nama Modul</th>																	
									
								</tr>
							</thead>
							<tbody>
								<tr>
							<?php
								$no = 1;
								foreach ($modul->result() as $row) {$check = ($row->active == 1) ? 'checked' : '';?>	
								
								<td><input type="checkbox" name="checkmodul" <?php echo $check?> id="<?php echo $row->id_akses?>" onclick="checkrow(this,this.id)"></td>															
								<td><?php echo $no++; ?></td>								
								<td><?php echo $row->kd_status; ?></td>
								<td><?php echo $row->nama_modul; ?></td>						
								
								
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
<script>
function checkrow(obj,val)
{
	if (obj.checked)
	{
		var check = 1;
	}
	else
	{
		var check = 0;
	}
	$.ajax ({

		url		: '<?php echo base_url('akses/edit_akses')?>',
		type	: 'post',
		data	: 'val='+val+'&check='+check,
		cache	: false,
		success	: function (param)
		{
			if (param == 1)
			{
			console.log('success');
			}else
			{
				console.log('gagal');
			}
		},
		error	: function (param)
		{
			alert('edit akses gaggal' + param);
		}

	});
}
function checkrowall(obj,val)
{
	var cb = document.getElementsByTagName('input');
	if (obj.checked)
	{
		for (var i=0; i < cb.length; i++)
		{
			cb[i].checked = true;
		}
		var check = 1;
	}
	else
	{
		for (var i=0; i < cb.length; i++)
		{
			cb[i].checked = false;
		}
		var check = 0;
	}
	$.ajax ({

		url		: '<?php echo base_url('akses/edit_akses_all')?>',
		type	: 'post',
		data	: 'val='+val+'&check='+check,
		cache	: false,
		success	: function (param)
		{
			
			if (param == 1)
			{
				
				console.log('success');
			}else
			{
				console.log('gagal');
			}
		},
		error	: function (param)
		{
			alert('edit akses gaggal' + param);
		}

	});
}
</script>