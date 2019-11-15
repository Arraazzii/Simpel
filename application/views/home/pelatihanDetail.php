<section class="ftco-section">
  <div class="container">
    <!-- Tab panes -->
    <div class="row mt-5 nomargintop">
      <div class="col-lg-8 col-md-7 col-sm-12 col-12">
        <?= $this->session->flashdata('notif');?>
        <h3><b><?= $detail[0]->nama;  ?></b></h3>
        <p class="text-justify">Kuota : <?= $detail[0]->kuota;  ?> Peserta</p>
        <p class="text-justify">Standar Kompetensi : <?= $detail[0]->standar_kompetensi;  ?> Peserta</p>
        <p class="text-justify">Keterangan : <?= $detail[0]->keterangan;  ?></p>
        <p class="text-justify">Tanggal Mulai Pelatihan : <?= tanggal_indo($detail[0]->tanggal_mulai_pelatihan, TRUE);  ?></p>
        <p class="text-justify">Tanggal Berakhir Pelatihan : <?= tanggal_indo($detail[0]->tanggal_berakhir_pelatihan, TRUE);  ?></p>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-12 col-12">
        <h4 class="text-info"><b>Pelatihan Lainnya</b></h4>
        <?php foreach ($lainnya as $row) { ?>
          <div class="card mb-2">
            <div class="row m-1">
            <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-4">
              <img src="<?= base_url(); ?>assets/upload/berita/<?= $row->photo; ?>" class="img-donatur2">
              <h3><b></b></h3>
            </div> -->
            <div class="col-lg-12" style="padding: 10px">
              <h6 class="mb-0"><b><a href="<?= base_url(); ?>Home/pelatihanDetail/<?= $row->kode_pelatihan;  ?>"><?= $row->nama;  ?></a></b></h6>
              <small>Mulai Pelatihan : <?= $row->tanggal_mulai_pelatihan; ?><br>Mulai Pelatihan : <?= $row->tanggal_berakhir_pelatihan; ?></small>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <button class="btn btn-primary"  data-toggle="modal" data-target="#myModalTambah">Daftar</button>
</div>
</section>
<?php 
function tanggal_indo($tanggal, $cetak_hari = false) {
  $hari = array ( 
    1 => 'Senin',
    2 => 'Selasa',
    3 => 'Rabu',
    4 => 'Kamis',
    5 => 'Jumat',
    6 => 'Sabtu',
    7 => 'Minggu'
  );

  $bulan = array (
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
  );
  $split = explode('-', $tanggal);
      // $waktu = explode(' ', $split[2]);
  $tgl_indo = $split[2]. ' ' .$bulan[ (int)$split[1] ]. ' ' . $split[0];


  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}
?>

<!-- The Modal -->
<div class="modal" id="myModalTambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h6 class="modal-title">Daftar Pelatihan <?= $detail[0]->nama;  ?></h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="<?= base_url('Home/daftarPelatihan');?>" method="POST">
        <input type="hidden" name="id" value="<?= $detail[0]->kode_pelatihan;  ?>">
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" placeholder="NIK" required="">
          </div>
          <div class="form-group">
            <label>No. Kartu Keluarga</label>
            <input type="text" name="kk" class="form-control" placeholder="No. Kartu Keluarga" required="">
          </div>
          <div class="form-group">
            <label>No. AK1</label>
            <input type="text" name="ak1" class="form-control" placeholder="No. AK1" required="">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jk">
              <option hidden="" value="">Silahkan Pilih</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required="">
          </div>
          <div class="form-group">
            <label>No. Telpon/HP</label>
            <input type="text" name="no_telepon" class="form-control" placeholder="No. Telepon/HP" required="">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"></textarea>
          </div>
          <div class="form-group">
            <label>Kelurahan</label>
            <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" required="">
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required="">
          </div>
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="">
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <select class="form-control" name="pendidikan">
              <option hidden="" value="">Silahkan Pilih</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMK">SMK</option>
              <option value="Perguruan Tinggi">Perguruan Tinggi</option>
            </select>
          </div>
          <div class="form-group">
            <label>Status Pekerjaan</label>
            <select class="form-control" name="pekerjaan">
              <option hidden="" value="">Silahkan Pilih</option>
              <option value="Sudah Bekerja">Sudah Bekerja</option>
              <option value="Belum Bekerja">Belum Bekera</option>
            </select>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>