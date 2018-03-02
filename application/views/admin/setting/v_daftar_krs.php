
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
			      	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>setting/simpan_daftar" onsubmit="return cekform();">
			          <div class="form-group">
			          <?php $sms = ($semester == 0) ? 'Belum Disetujui' : $semester;?>
			          <label class="control-label col-sm-4">Semester Sekarang</label>
			            <div class="col-sm-4">
			              <div class="input-group">
			                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
			               	<input type="text" class="form-control" value="<?php echo $sms?>" readonly placeholder="Kode Status" autofocus="">
			              </div>
			            </div>
			          </div>

			          <div class="form-group">
			          <label class="control-label col-sm-4">Semester</label>
				          <div class="col-sm-4">
					          <div class="input-group">
		                  <span class="input-group-addon"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
		                  <select class="form-control" name="semester" id="semester">		                  
	                      <?php echo '<option value="0" selected>Mahasiswa Baru</option>';
		                      $sms = array('1','2','3','4','5','6','7','8');
		                      foreach ($sms as $val){
								$select = ($semester == $val) ? 'selected':'';								
									echo '<option value="'.$val.'" '.$select.'>'.$val.'</option>';
							  
						  		}?>	
	                     
		                  </select>
		              	</div>
		              </div>
			          </div>
			          

			          <div>
			       <button type="reset" class="btn btn-info">Reset</button>
                  <button type="button" onclick="window.history.back()" class="btn btn-warning">Tutup</button>
                  <button type="submit" class="btn btn-success">Simpan</button>
              	</div>         
              	<input type="hidden" name="nim" value="<?php echo $nim?>">               
		         	</form>
		      	</div>
		    	</div>
		  	</div>
			</div>
		</div>
	</div>
</div>
</div>