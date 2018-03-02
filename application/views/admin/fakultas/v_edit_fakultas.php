<script type="text/javascript">
	function cekform() {

		if(!$("#kd_fakultas").val()) {
			alert('Kode Fakultas tidak boleh kosong');
			$("#kd_fakultas").focus()
			return false;
		}

		if(!$("#fakultas").val()) {
			alert('Nama Fakultas tidak boleh kosong');
			$("#fakultas").focus()
			return false;
		}

		if(!$("#id_dosen").val()) {
			alert('ID Ketua Fakultas tidak boleh kosong');
			$("#id_dosen").focus()
			return false;
		}
	}
</script>

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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>fakultas/simpan_edit" onsubmit="return cekform();">
			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Fakultas</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_fakultas" id="kd_fakultas" placeholder="Kode Fakultas" autofocus="" value="<?php echo $kd_fakultas?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Fakultas</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="fakultas" id="fakultas" placeholder="Nama Fakultas" value="<?php echo $fakultas?>">
			              </div>
			            </div>
			          </div>

			         <div class="form-group">
			          <label class="control-label col-sm-4">Ketua Fakultas</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-education" aria-hidden="true"></span></span>
		                  <select class="form-control" name="id_dosen" id="id_dosen">	                      
	                      <?php foreach ($dosen->result() as $row){
	                      	$select = ($id_dosen == $row->nid) ? 'selected' : '';
	                      	echo '<option value="'.$row->nid.'" '.$select.'>'.$row->nid.' - '.$row->nama_dosen.'</option>';
	                      }?>
		                  </select>
		              	</div>
		              </div>
			          </div>

			          <div>
			          	
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