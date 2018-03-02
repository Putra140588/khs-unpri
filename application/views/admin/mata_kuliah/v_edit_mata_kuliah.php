<script type="text/javascript">
	function cekform() {
		if(!$("#kd_mata_kuliah").val()) {
			alert('Kode Mata Kuliah tidak boleh kosong');
			$("#kd_mata_kuliah").focus()
			return false;
		}

		if(!$("#mata_kuliah").val()) {
			alert('Nama Mata Kuliah tidak boleh kosong');
			$("#mata_kuliah").focus()
			return false;
		}

		if(!$("#sks").val()) {
			alert('Jumlah SKS tidak boleh kosong');
			$("#sks").focus()
			return false;
		}
		if(!$("#semester").val()) {
			alert('Semester tidak boleh kosong');
			$("#semester").focus()
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
        
          <P> <div class="alert" id="alert" style="display:none" role="alert"><?php echo $this->session->flashdata('info')?></div><p></P>
			    <div class="panel-body">
			      <div class="dataTable_wrapper">
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mata_kuliah/simpan_edit" onsubmit="return cekform();">

			          <div class="form-group">
			          <label class="control-label col-sm-4">Kode Mata Kuliah</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="kd_mata_kuliah" id="kd_mata_kuliah" placeholder="Kode Mata Kuliah" autofocus="" readonly value="<?php echo $kd_mata_kuliah?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Nama Mata Kuliah</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="fa fa-list-alt" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" name="mata_kuliah" id="mata_kuliah" placeholder="Nama Mata Kuliah" value="<?php echo $mata_kuliah?>">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Jumlah SKS</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></span>
		                  <select class="form-control" name="sks" id="sks">	                     
	                      <?php $sksrow = array('1','2','3','4');
	                      foreach ($sksrow as $val){
								$select = ($sks == $val) ? 'selected' : '';
								echo '<option value="'.$val.'" '.$select.'>'.$val.'</option>';
						  }?>	                      
		                  </select>
		              	</div>
		              </div>
			          </div>
			          
			          <div class="form-group">
			          <label class="control-label col-sm-4">Semester</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></span>
		                  <select class="form-control" name="semester" id="semester">	                     
	                      <?php $sms = array('1 (Ganjil)','2 (Genap)','3 (Ganjil)','4 (Genap)','5 (Ganjil)','6 (Genap)','7 (Ganjil)','8 (Genap)');
	                      foreach ($sms as $val){
							$select = ($semester == $val) ? 'selected' : '';
								echo '<option value="'.$val.'" '.$select.'>'.$val.'</option>';
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