<script type="text/javascript">
  function cekform() {

    if(!$("#semester").val()) {
      alert('Semester yang akan diambil tidak boleh kosong');
      $("#semester").focus()
      return false;
    }

    if(!$("#tahun_ajaran").val()) {
      alert('Tahun Ajaran yang akan diambil tidak boleh kosong');
      $("#tahun_ajaran").focus()
      return false;
    }

    if(!$("#id_mahasiswa").val()) {
      alert('ID Mahasiswa tidak boleh kosong');
      $("#id_mahasiswa").focus()
      return false;
    }

    //if(!$("#kd_mata_kuliah1").val()) {
      //alert('Silahkan masukkan Kode dan Nama Mata Kuliah yang akan Anda ambil');
      //$("#kd_mata_kuliah1").focus()
      //return false;
    //}

    //if(!$("#kd_mata_kuliah2").val()) {
      //alert('Silahkan masukkan Kode dan Nama Mata Kuliah yang akan Anda ambil');
      //$("#kd_mata_kuliah2").focus()
      //return false;
    //}

    //if(!$("#kd_mata_kuliah3").val()) {
      //alert('Silahkan masukkan Kode dan Nama Mata Kuliah yang akan Anda ambil');
      //$("#kd_mata_kuliah3").focus()
      //return false;
    //}

    //if(!$("#kd_mata_kuliah4").val()) {
      //alert('Silahkan masukkan Kode dan Nama Mata Kuliah yang akan Anda ambil');
      //$("#kd_mata_kuliah4").focus()
      //return false;
    //}
  }
</script>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
      <strong><?php echo $sub_subjudul; ?></strong>
      </div>
            <!-- /.panel-heading -->
      <div class="panel-body">
        <form role="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/krs/simpan" onsubmit="return cekform();">
          
          <div class="row text-center">
            <P><?php
            $info = $this->session->flashdata('info');
            if (!empty($info)) {
              echo  $info;
            }
            ?></P>
          </div>
          <div class="row">
            <div class="col-md-4">
              <h4>UNIVERSITAS PRAMITA INDONESIA</h4>
              <h5>FORM RENCANA STUDI MAHASISWA</h5>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
                <select class="form-control" name="semester" id="semester" autofocus="">
                  <option selected disabled>-Pilih Semester-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                </select>
              </div>
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span></span>
                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                  <option selected disabled>-Pilih Tahun Ajaran-</option>
                  <option value="2010/2011">2010/2011</option>
                  <option value="2011/2012">2011/2012</option>
                  <option value="2012/2013">2012/2013</option>
                  <option value="2013/2014">2013/2014</option>
                  <option value="2014/2015">2014/2015</option>
                  <option value="2015/2016">2015/2016</option>
                  <option value="2016/2017">2016/2017</option>
                  <option value="2017/2018">2017/2018</option>
                  <option value="2018/2019">2018/2019</option>
                  <option value="2019/2020">2019/2020</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
                <input type="text" class="form-control" name="id_mahasiswa" id="id_mahasiswa" placeholder="Masukan ID Mahasiswa">
              </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
          </div><br><br>

          <div class="row">
            <div class="col-md-1">
              <span class="input-group-addon"><span aria-hidden="true">No.</span></span>
            </div>
            <div class="col-md-2">
              <span class="input-group-addon"><span aria-hidden="true">Kode</span></span>
            </div>
            <div class="col-md-7">
              <span class="input-group-addon"><span aria-hidden="true">Mata Kuliah</span></span>
            </div>
            <div class="col-md-1">
              <span class="input-group-addon"><span aria-hidden="true">Kredit</span></span>
            </div>
            <div class="col-md-1">
              <span class="input-group-addon"><span aria-hidden="true">Prb*</span></span>
            </div>
          </div>

          <div class="row">
            <div class="col-md-1">
              <input type="text" class="form-control" placeholder="">
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="kd_mata_kuliah" id="kd_mata_kuliah" placeholder="">
            </div>
            <div class="col-md-7">
              <input type="text" class="form-control" name="mata_kuliah" id="mata_kuliah" placeholder="">
            </div>
            <div class="col-md-1">
              <input type="text" class="form-control" name="sks" id="sks" placeholder="">
            </div>
            <div class="col-md-1">
              <input type="text" class="form-control" name="prb" id="prb" placeholder="">
            </div>
          </div>

          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-7">
            </div>
            <div class="col-md-1">
              <input type="text" class="form-control" name="total_sks" id="total_sks" placeholder="Total" readonly>
            </div>
            <div class="col-md-1">
            </div>
          </div><br>

          <div class="row">
            <div class="col-md-12">
              <p><strong>Catatan:</strong>
              <small>Harap masukan <b>KODE MATA KULIAH</b> dengan benar!</small></p>
            </div>
          </div><br><br>

          <div class="text-center">
            <button type="reset" class="btn btn-info">Reset</button>
            <a href="<?php echo base_url(); ?>admin/krs" type="submit" class="btn btn-warning">Tutup</a>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
