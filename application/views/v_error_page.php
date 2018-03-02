 <div id="page-wrapper">
        <div class="row">   
            <div class="col-lg-12">
                 <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <?php echo $judul?>
                        </h3>
                       
                    </div>
                </div>                  
                </h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <?php echo $this->session->flashdata('error_page')?>
                        </div>
                    </div>
                </div>

            </div>
        
        </div>
        <!-- /.row -->
            
    </div>