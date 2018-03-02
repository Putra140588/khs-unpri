<script type="text/javascript">
	function cekform() {

		if(!$("#kd_status").val()) {
			alert('Kode Status tidak boleh kosong');
			$("#kd_status").focus()
			return false;
		}

		if(!$("#status").val()) {
			alert('Nama Status tidak boleh kosong');
			$("#status").focus()
			return false;
		}

	}
</script>
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
           <div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div><p>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>status/simpan_edit" onsubmit="return cekform();">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Status</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_status" id="kd_status" placeholder="Kode Status" autofocus="" readonly value="<?php echo $kd_status?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Status</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="status" id="status" placeholder="Nama Status" value="<?php echo $status?>">
			              </div>
			            </div>
			          </div>

			          <div>
			      
                  <button type="button" onclick="window.history.back()" class="btn btn-warning">Tutup</button>
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