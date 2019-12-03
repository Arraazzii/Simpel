<section class="ftco-section">
  <div class="container">
    <!-- Tab panes -->
    <div class="row mt-5 nomargintop">
    <?php foreach ($detail as $detail) { ?>
      <div class="col-lg-8 col-md-7 col-sm-12 col-12">
        <h3><b><?php echo $detail->nama; ?> </b></h3>
        <p class="text-justify"><?php echo $detail->alamat; ?></p>
      </div>
    <?php } ?>
      <div class="col-lg-4 col-md-5 col-sm-12 col-12">
        <h4 class="text-info"><b>LPK Lainnya</b></h4>
        <?php foreach ($lpk as $lpk) { ?>
        <div class="card mb-2">
          <div class="row m-1">
            <div class="col-lg-4 col-md-4 col-sm-4 col-4">
              <img src="<?php echo base_url(); ?>assets/home/images/bg_3.jpg" class="img-donatur2">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-8">
              <h6 class="mb-0"><b><a href="<?= base_url();?>Home/lpkDetail/<?= $lpk->kode_user; ?>"><?= $lpk->nama  ; ?></a></b></h6>
              <small><?= $lpk->alamat  ; ?></small>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>