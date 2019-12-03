<section class="ftco-section mt-5 nomargintop">
 <div class="container">
  <h2 class="text-center text-info ftco-animate"><b>LPK / BLKLN</b></h2>
  <br>
  <div class="row d-flex ftco-animate justify-content-center">
    <?php foreach ($lpk as $lpk) { ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3 removelpk">
      <div class="card">
        <div class="card-body">
          <a href="<?= base_url();?>Home/lpkDetail/<?= $lpk->kode_user; ?>"><h5 class="text-info"><?= $lpk->nama  ; ?></h5></a>
          <p><?= $lpk->alamat; ?></p>
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