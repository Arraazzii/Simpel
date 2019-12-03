<section class="ftco-section mt-5 nomargintop">
 <div class="container">
  <h2 class="text-center text-info ftco-animate"><b>LPK / BLKLN</b></h2>
  <br>
  <div class="row d-flex ftco-animate justify-content-center">
    <?php foreach ($lpk as $lpk) { ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3 divControl">
      <div class="card">
        <div class="card-body">
          <a href="<?= base_url();?>Home/lpkDetail/<?= $lpk->kode_user; ?>"><h5 class="text-info"><?= $lpk->nama  ; ?></h5></a>
          <p><?= $lpk->alamat; ?></p>
        </div>
      </div>
    </div>
    <?php } ?>
    
  </div>
  <div class="row justify-content-center">
    <div class="prev">prev</div>
    <div id="divPages"></div>
    <div class="next">next</div>
  </div>
</div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/pagination.js"></script>