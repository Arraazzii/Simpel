<section class="ftco-section mt-5 nomargintop">
 <div class="container">
  <h2 class="text-center text-info ftco-animate"><b>Berita / Event</b></h2>
  <br>
  <div class="row justify-content-center">
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