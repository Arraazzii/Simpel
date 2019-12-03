<section class="ftco-section mt-5 nomargintop">
 <div class="container">
  <h2 class="text-center text-info ftco-animate"><b>Jadwal Pelatihan</b></h2>
  <br>
  <div class="row d-flex ftco-animate justify-content-center">
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
  <ul class="pagination text-center justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</div>
</section>