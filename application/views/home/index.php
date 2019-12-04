<section class="hero-wrap hero-wrap-2 margin-section-top">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <!-- The slideshow -->
    <div class="carousel-inner">
      <?php 
      if (empty($slider)) { ?>
        <div class="carousel-item active">
          <img src="<?= base_url(); ?>assets/home/images/bg_1.jpg" alt="Slider2" class="carousel-obj">
<!--           <div class="carousel-caption">
            <h3 class="text-white">Sistem Pelatihan Kota Depok</h3>
            <p>Selamat Datang Di Website Sistem Pelatihan Kota Depok</p>
            <button class="btn btn-info" type="button">Selengkapnya</button>
          </div> -->
        </div>
      <?php } else {
        $no = 0;
        foreach ($slider as $slide) { $no++;?>
          <div class="carousel-item <?php if($no <= 1){echo 'active';}?>">
            <img src="<?= base_url(); ?>assets/upload/slider/<?= $slide->photo; ?>" alt="Slider1" class="carousel-obj">
<!--             <div class="carousel-caption">
              <h3 class="text-white"><?= $slide->judul; ?></h3>
              <p><?= $slide->detail; ?></p>
              <button class="btn btn-info" type="button">Selengkapnya</button>
            </div> -->
          </div> 
        <?php }

      }  ?>

      <!-- <div class="carousel-item">
        <img src="<?= base_url(); ?>assets/home/images/bg_2.jpg" alt="Slider2" class="carousel-obj">
        <div class="carousel-caption">
          <h3 class="text-white">Bursa Kerja Khusus Kota Depok</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button class="btn btn-info" type="button">Selengkapnya</button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url(); ?>assets/home/images/bg_3.jpg" alt="Slider3" class="carousel-obj">
        <div class="carousel-caption">
          <h3 class="text-white">Bursa Kerja Khusus Kota Depok</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button class="btn btn-info" type="button">Selengkapnya</button>
        </div>
      </div> -->
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>
</section>

<section class="ftco-section mt-4">
 <div class="container">
  <h2 class="text-center text-info ftco-animate"><b>Jadwal Pelatihan</b></h2>
  <div class="row d-block">
    <div class="col-md-12">
      <div class="row ftco-animate">
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
          <label>Bulan</label>
          <div class="form-group">
            <select class="form-control" id="bulanpelatihan">
              <option value="">Silahkan Pilih</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
          <label>Tahun</label>
          <div class="form-group">
            <select class="form-control" id="tahunpelatihan">
              <option value="">Silahkan Pilih</option>
              <?php
                      for($tahunchart1 = date('2010'); $tahunchart1 <= date('Y'); $tahunchart1++){ 
                    ?>
                    <option value="<?php echo $tahunchart1; ?>"><?php echo $tahunchart1; ?></option>
                    <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
          <label>Jenis Pelatihan</label>
          <div class="form-group">
            <select class="form-control" id="jenispelatihan">
              <option value="">Silahkan Pilih</option>
              <?php foreach ($jenis as $jenis) { ?>
              <option value="<?php echo $jenis->kode_jenis; ?>"><?php echo $jenis->jenis; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
          <label>Nama Pelatihan</label>
          <div class="form-group">
           <input type="text" class="form-control" placeholder="Masukan Pencarian Disini" id="keypelatihan">
         </div>
       </div>
     </div>
      <div class="row ftco-animate" id="appendpelatihan">
       <?php foreach ($pelatihan as $row) { ?>
         <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3 removepelatihan">
          <div class="card">
            <div class="card-body">
              <a href="<?= base_url(); ?>Home/pelatihanDetail/<?= $row->kode_pelatihan; ?>"><h5 class="text-info"><?= $row->nama;?></h5></a>
              <?php
              $date = date('Y-m-d');
              if ($date > $row->tanggal_berakhir_daftar) { ?>
              <span class="badge badge-danger">Expired</span>
              <?php } ?>
              <span class="badge badge-success"><?= $row->standar_kompetensi;?></span>
              <p><?= $row->keterangan;?></p>
              <a href="<?= base_url(); ?>Home/pelatihanDetail/<?= $row->kode_pelatihan; ?>" class="btn btn-info float-right">Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <br>
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- <a href="<?= base_url();?>Home/pelatihan" class="btn btn-danger w-100 ftco-animate mb-1">Lihat Semua Pelatihan</a> -->
      </div>
    </div>
  </div>
</div>
</div>
</section>

<section class="ftco-section bg-light mt-4">
 <div class="container">
  <h2 class="text-center text-info ftco-animate"><b>LPK Terdaftar</b></h2>
  <div class="row d-block">
    <div class="col-md-12">
      <div class="row justify-content-end ftco-animate">
        <div class="col-lg-5 col-md-5 col-sm-6 col-12 float-right">
          <label>Pencarian</label>
          <div class="form-group">
           <input type="text" class="form-control" placeholder="Masukan Pencarian LPK Disini" name="" id="keylpk">
         </div>
       </div>
     </div>
     <div class="row ftco-animate" id="appendlpk">
      <?php foreach ($lpk as $row) { ?>
      <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3 removelpk">
        <div class="card">
          <div class="card-body">
            <a href="<?= base_url();?>Home/lpkDetail/<?= $row->kode_user; ?>"><h5 class="text-info"><?= $row->nama  ; ?></h5></a>
            <p><?= $row->alamat; ?></p>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
    <br>
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- <a href="<?= base_url();?>Home/lpk" class="btn btn-danger w-100 ftco-animate mb-1">Lihat Semua LPK</a> -->
      </div>
    </div>
  </div>
</div>
</div>
</section>

<section class="ftco-section bg-info">
  <div class="container">
    <div class="row text-center d-block">
      <div class="col-md-12">
        <h2 class="text-center text-light ftco-animate"><b>Informasi</b></h2>
        <div class="row ftco-animate">
          <?php foreach ($berita as $row) { ?>
          <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated ">
            <div class="blog-entry justify-content-end w-100">
              <a href="<?= base_url(); ?>Home/infoDetail" class="block-20" style="background-image: url('<?= base_url(); ?>assets/upload/berita/<?= $row->photo; ?>');">
              </a>
              <div class="text mt-3 mb-3 float-right d-block">
                <h3 class="heading"><a href="<?= base_url(); ?>Home/infoDetail/<?= $row->id; ?>"><?= $row->judul; ?></a></h3>
                <p class="text-justify"><?= $row->detail; ?></p>
                <a href="<?= base_url(); ?>Home/infoDetail/<?= $row->id; ?>" class="btn btn-info float-right">Selengkapnya</a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <br>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- <a href="<?= base_url();?>Home/info" class="btn btn-danger w-100 ftco-animate mb-1">Lihat Semua Informasi</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->session->flashdata('notif'); ?>
<!-- <script>
  $(function () { //ready
    toastr.info('If all three of these are referenced correctly, then this should toast should pop-up.');
  });
</script> -->

<script type="text/javascript">
  $(document).ready(function(){
    $("#jenispelatihan").change(function(){
      var jenispelatihan = $("#jenispelatihan").val();
      var tahunpelatihan = $("#tahunpelatihan").val();
      var bulanpelatihan = $("#bulanpelatihan").val();
      var keypelatihan = $("#keypelatihan").val();
      $.ajax({
      type: "POST",
      dataType : 'JSON',
      url: "<?php echo base_url(); ?>Home/cariPelatihan",
      data: {jenispelatihan: jenispelatihan, tahunpelatihan: tahunpelatihan, keypelatihan: keypelatihan, bulanpelatihan: bulanpelatihan},
      success: function(msg) {
        var html = "";
        var date = "<?php echo date('Y-m-d'); ?>";
        $(".removepelatihan").remove();
        $.each(msg, function(index, val){
          html += "<div class='col-lg-4 col-md-4 col-sm-6 col-12 mb-3 removepelatihan' >";
          html += "<div class='card'><div class='card-body'><a href='<?= base_url(); ?>Home/pelatihanDetail/" + val.kode_pelatihan + "'><h5 class='text-info'>"+val.nama+"</h5></a>";
          if (date > val.tanggal_berakhir_daftar) {
            html += "<span class='badge badge-danger'>Expired</span>";
          }
          html += "<span class='badge badge-success'>" + val.standar_kompetensi + "</span>";
          html += "<p>" + val.keterangan + "</p>";
          html += "<a href='<?= base_url(); ?>Home/pelatihanDetail/"+val.kode_pelatihan+"' class='btn btn-info float-right'>Selengkapnya</a>";
          html += " </div></div></div>";
        });
        $("#appendpelatihan").append(html);
      }
      });
    });
    $("#tahunpelatihan").change(function(){
      var jenispelatihan = $("#jenispelatihan").val();
      var tahunpelatihan = $("#tahunpelatihan").val();
      var bulanpelatihan = $("#bulanpelatihan").val();
      var keypelatihan = $("#keypelatihan").val();
      $.ajax({
      type: "POST",
      dataType : 'JSON',
      url: "<?php echo base_url(); ?>Home/cariPelatihan",
      data: {jenispelatihan: jenispelatihan, tahunpelatihan: tahunpelatihan, keypelatihan: keypelatihan, bulanpelatihan: bulanpelatihan},
      success: function(msg) {
        var html = "";
        var date = "<?php echo date('Y-m-d'); ?>";
        $(".removepelatihan").remove();
        $.each(msg, function(index, val){
          html += "<div class='col-lg-4 col-md-4 col-sm-6 col-12 mb-3 removepelatihan' >";
          html += "<div class='card'><div class='card-body'><a href='<?= base_url(); ?>Home/pelatihanDetail/" + val.kode_pelatihan + "'><h5 class='text-info'>"+val.nama+"</h5></a>";
          if (date > val.tanggal_berakhir_daftar) {
            html += "<span class='badge badge-danger'>Expired</span>";
          }
          html += "<span class='badge badge-success'>" + val.standar_kompetensi + "</span>";
          html += "<p>" + val.keterangan + "</p>";
          html += "<a href='<?= base_url(); ?>Home/pelatihanDetail/"+val.kode_pelatihan+"' class='btn btn-info float-right'>Selengkapnya</a>";
          html += " </div></div></div>";
        });
        $("#appendpelatihan").append(html);
      }
      });
    });
    $("#bulanpelatihan").change(function(){
      var jenispelatihan = $("#jenispelatihan").val();
      var tahunpelatihan = $("#tahunpelatihan").val();
      var bulanpelatihan = $("#bulanpelatihan").val();
      var keypelatihan = $("#keypelatihan").val();
      $.ajax({
      type: "POST",
      dataType : 'JSON',
      url: "<?php echo base_url(); ?>Home/cariPelatihan",
      data: {jenispelatihan: jenispelatihan, tahunpelatihan: tahunpelatihan, keypelatihan: keypelatihan, bulanpelatihan: bulanpelatihan},
      success: function(msg) {
        var html = "";
        var date = "<?php echo date('Y-m-d'); ?>";
        $(".removepelatihan").remove();
        $.each(msg, function(index, val){
          html += "<div class='col-lg-4 col-md-4 col-sm-6 col-12 mb-3 removepelatihan' >";
          html += "<div class='card'><div class='card-body'><a href='<?= base_url(); ?>Home/pelatihanDetail/" + val.kode_pelatihan + "'><h5 class='text-info'>"+val.nama+"</h5></a>";
          if (date > val.tanggal_berakhir_daftar) {
            html += "<span class='badge badge-danger'>Expired</span>";
          }
          html += "<span class='badge badge-success'>" + val.standar_kompetensi + "</span>";
          html += "<p>" + val.keterangan + "</p>";
          html += "<a href='<?= base_url(); ?>Home/pelatihanDetail/"+val.kode_pelatihan+"' class='btn btn-info float-right'>Selengkapnya</a>";
          html += " </div></div></div>";
        });
        $("#appendpelatihan").append(html);
      }
      });
    });
    $("#keypelatihan").on('keyup',function(){
      var jenispelatihan = $("#jenispelatihan").val();
      var tahunpelatihan = $("#tahunpelatihan").val();
      var bulanpelatihan = $("#bulanpelatihan").val();
      var keypelatihan = $("#keypelatihan").val();
      $.ajax({
      type: "POST",
      dataType : 'JSON',
      url: "<?php echo base_url(); ?>Home/cariPelatihan",
      data: {jenispelatihan: jenispelatihan, tahunpelatihan: tahunpelatihan, keypelatihan: keypelatihan, bulanpelatihan: bulanpelatihan},
      success: function(msg) {
        var html = "";
        var date = "<?php echo date('Y-m-d'); ?>";
        $(".removepelatihan").remove();
        $.each(msg, function(index, val){
          html += "<div class='col-lg-4 col-md-4 col-sm-6 col-12 mb-3 removepelatihan' >";
          html += "<div class='card'><div class='card-body'><a href='<?= base_url(); ?>Home/pelatihanDetail/" + val.kode_pelatihan + "'><h5 class='text-info'>"+val.nama+"</h5></a>";
          if (date > val.tanggal_berakhir_daftar) {
            html += "<span class='badge badge-danger'>Expired</span>";
          }
          html += "<span class='badge badge-success'>" + val.standar_kompetensi + "</span>";
          html += "<p>" + val.keterangan + "</p>";
          html += "<a href='<?= base_url(); ?>Home/pelatihanDetail/"+val.kode_pelatihan+"' class='btn btn-info float-right'>Selengkapnya</a>";
          html += " </div></div></div>";
        });
        $("#appendpelatihan").append(html);
      }
      });
    });
    $("#keylpk").on('keyup',function(){
      var keylpk = $("#keylpk").val();
      $.ajax({
      type: "POST",
      dataType : 'JSON',
      url: "<?php echo base_url(); ?>Home/carilpk",
      data: {keylpk: keylpk},
      success: function(msg) {
        var html = "";
        var date = "<?php echo date('Y-m-d'); ?>";
        $(".removelpk").remove();
        $.each(msg, function(index, val){
          html += "<div class='col-lg-4 col-md-4 col-sm-6 col-12 mb-3 removelpk'><div class='card'><div class='card-body'><a href='<?= base_url();?>Home/lpkDetail/" + val.kode_user + "'><h5 class='text-info'>" + val.nama + "</h5></a><p>" + val.alamat + "</p></div></div></div>";
        });
        $("#appendlpk").append(html);
      }
      });
    });
  });
</script>