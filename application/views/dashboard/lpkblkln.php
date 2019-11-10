<?= $this->session->flashdata('notif');?>
<style type="text/css">
    fieldset {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;       
        position: relative;
        border-radius:4px;
        background-color:#f5f5f5;
        padding-left:10px!important;
    }   
    
    legend {
        font-size:14px;
        font-weight:bold;
        margin-bottom: 0px; 
        width: 20%; 
        border: 1px solid #ddd;
        border-radius: 4px; 
        padding: 5px 5px 5px 10px; 
        background-color: #ffffff;
    }
    .table th {
       text-align: center;   
   }
   .table td {
       text-align: center;   
   }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">LPK / BLKLN</h4>
                </div>
                <div class="float-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalTambah">Tambah</button>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama / Tipe</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($lpkblkln as $row) { ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $row->nama; ?> / <?= $row->tipe; ?></td>
                                    <td><?= $row->email; ?></td>
                                    <td><?= $row->alamat; ?></td>
                                    <td>
                                        <?php if ($row->status == 'Aktif') { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php } elseif ($row->status == 'Pending') { ?>
                                            <span class="badge badge-warning">Menunggu Persetujuan</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Suspend</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#myModalLihat<?= $row->kode_user; ?>">Detail</button>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="hapusLPK('<?= $row->kode_user; ?>')">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
$no = 1;
foreach ($lpkblkln as $row) { 
    $query1 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Karyawan' AND jenis_kelamin = 'Laki-laki' LIMIT 1")->result_array();
    $query2 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Karyawan' AND jenis_kelamin = 'Perempuan' LIMIT 1")->result_array();
    $query3 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Tenaga Pelatihan Tetap' AND jenis_kelamin = 'Laki-laki' LIMIT 1")->result_array();
    $query4 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Tenaga Pelatihan Tetap' AND jenis_kelamin = 'Perempuan' LIMIT 1")->result_array();
    $query5 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Tenaga Pelatihan Tidak Tetap' AND jenis_kelamin = 'Laki-laki' LIMIT 1")->result_array();
    $query6 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Tenaga Pelatihan Tidak Tetap' AND jenis_kelamin = 'Perempuan' LIMIT 1")->result_array();
    $query7 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Instruktur Tetap' AND jenis_kelamin = 'Laki-laki' LIMIT 1")->result_array();
    $query8 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Instruktur Tetap' AND jenis_kelamin = 'Perempuan' LIMIT 1")->result_array();
    $query9 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Instruktur Tidak Tetap' AND jenis_kelamin = 'Laki-laki' LIMIT 1")->result_array();
    $query10 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Instruktur Tidak Tetap' AND jenis_kelamin = 'Perempuan' LIMIT 1")->result_array();
    $query11 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Asesor Kompetensi' AND jenis_kelamin = 'Perempuan' LIMIT 1")->result_array();
    $query12 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Asesor Kompetensi' AND jenis_kelamin = 'Perempuan' LIMIT 1")->result_array();
    $query13 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Instruktur/Asesor WNA' AND jenis_kelamin = 'Laki-laki' LIMIT 1")->result_array();
    $query14 = $this->db->query("SELECT jumlah FROM table_anggota WHERE kode_user = '$row->kode_user' AND tipe = 'Instruktur/Asesor WNA' AND jenis_kelamin = 'Perempuan' LIMIT 1")->result_array();
    ?>
    <!-- The Modal -->
    <div class="modal" id="myModalLihat<?= $row->kode_user; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail <?= $row->tipe; ?> : <?= $row->nama; ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <img class="p-20" src="<?= base_url();?>assets/upload/logo/<?= $row->photo; ?>" alt="<?= $row->photo; ?>">
                <div class="modal-body">
                    <div class="tab tab-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"> <i class="fa fa-home"></i> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pengurus-tab" data-toggle="tab" href="#pengurus" role="tab" aria-controls="pengurus" aria-selected="false"><i class="fa fa-user"></i> Pengurus </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false"><i class="fa fa-list"></i> Detail </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="form-group">
                                    <label>No. Izin</label>
                                    <textarea class="form-control"><?= $row->no_izin ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal izin</label>
                                    <textarea class="form-control"><?= $row->tanggal_izin ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lembaga</label>
                                    <input type="text" value="<?= $row->nama; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control"><?= $row->alamat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <textarea class="form-control"><?= $row->telepon ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="<?= $row->email ?>" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pengurus" role="tabpanel" aria-labelledby="pengurus-tab">
                                <div class="form-group">
                                    <label>Nama Direktur Lembaga</label>
                                    <input type="text" value="<?= $row->nama_pimpinan ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No Direktur Lembaga</label>
                                    <input type="text" value="<?= $row->no_telepon_pimpinan ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Penanggung Jawab Lembaga</label>
                                    <input type="text" value="<?= $row->nama_pj ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan Penanggung Jawab Lembaga</label>
                                    <input type="text" value="<?= $row->jabatan_pj ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No Penanggung Jawab Lembaga</label>
                                    <input type="text" value="<?= $row->no_telepon_pj ?>" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                <div class="accordion" id="accordionsimplefill">
                                    <div class="mb-2 acd-group">
                                        <div class="card-header bg-primary rounded-0">
                                            <h5 class="mb-0">
                                                <a href="#collapse" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Lembaga</a>
                                            </h5>
                                        </div>
                                        <div id="collapse" class="collapse" data-parent="#accordionsimplefill">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Jenis Kelembagaan</label>
                                                    <select class="form-control">
                                                        <option <?php if ($row->jenis == 'Pemerintah') {echo 'selected';} ?>>Pemerintah</option>
                                                        <option <?php if ($row->jenis == 'Swasta') {echo 'selected';} ?>>Swasta</option>
                                                        <option <?php if ($row->jenis == 'Perusahaan') {echo 'selected';} ?>>Perusahaan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ruang Lingkup Lembaga</label>
                                                    <input type="text" value="<?= $row->ruang_lingkup; ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Akreditasi</label>
                                                    <input type="text" value="<?= $row->status_akreditas; ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>No. Akreditasi</label>
                                                    <input type="text" value="<?= $row->no_akreditas; ?>" class="form-control">
                                                </div>
                                                                    <!-- <div class="form-group">
                                                                        <label>Uji Kompetensi Lembaga</label>
                                                                        <input type="text" name="" class="form-control">
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse1" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Karyawan</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse1" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Laki - Laki</label>
                                                                                <input type="number" value="<?= $query1[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Perempuan</label>
                                                                                <input type="number" value="<?= $query2[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Keterangan</label>
                                                                                <textarea class="form-control"></textarea>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Tenaga Kerja Tetap</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse2" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Laki - Laki</label>
                                                                                <input type="number" value="<?= $query3[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Perempuan</label>
                                                                                <input type="number" value="<?= $query4[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Keterangan</label>
                                                                                <textarea class="form-control"></textarea>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse3" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Tenaga Kerja Tidak Tetap</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse3" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Laki - Laki</label>
                                                                                <input type="number" value="<?= $query5[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Perempuan</label>
                                                                                <input type="number" value="<?= $query6[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Keterangan</label>
                                                                                <textarea class="form-control"></textarea>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse4" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Instruktur Tetap</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse4" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Laki - Laki</label>
                                                                                <input type="number" value="<?= $query7[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Perempuan</label>
                                                                                <input type="number" value="<?= $query8[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Keterangan</label>
                                                                                <textarea class="form-control"></textarea>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse5" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Instruktur Tidak Tetap</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse5" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Laki - Laki</label>
                                                                                <input type="number" value="<?= $query9[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Perempuan</label>
                                                                                <input type="number" value="<?= $query10[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Keterangan</label>
                                                                                <textarea class="form-control"></textarea>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse6" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Asesor Kompetensi</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse6" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Laki - Laki</label>
                                                                                <input type="number" value="<?= $query11[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Perempuan</label>
                                                                                <input type="number" value="<?= $query12[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Keterangan</label>
                                                                                <textarea class="form-control"></textarea>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse7" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Asesor Instruksi Asing</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse7" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Laki - Laki</label>
                                                                                <input type="number" value="<?= $query13[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Perempuan</label>
                                                                                <input type="number" value="<?= $query14[0]['jumlah']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Keterangan</label>
                                                                                <textarea class="form-control"></textarea>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <?php if ($row->status == 'Pending') { ?>
                                            <button type="button" class="btn btn-danger" onclick="blokir('<?= $row->kode_user; ?>')">Blokir</button>
                                            <button type="button" class="btn btn-success" onclick="aktivasi('<?= $row->kode_user; ?>')">Aktivasi</button>
                                        <?php } elseif ($row->status == 'Suspend') { ?>
                                           <button type="button" class="btn btn-danger" onclick="aktivasi('<?= $row->kode_user; ?>')">Buka Blokir</button>
                                       <?php } else { ?>
                                        <button type="button" class="btn btn-danger" onclick="blokir('<?= $row->kode_user; ?>')">Blokir</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- The Modal -->
                <div class="modal" id="myModalTambah">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah LPK / BLKLN</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <form action="<?= base_url('Dashboard/buatAkunLPK'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label">Type Akun <span style="color:red" title="Wajib Diisi">*</span></label><br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="tipe" class="custom-control-input" value="LPK" required>
                                                <label class="custom-control-label" for="customRadioInline1">LPK</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="tipe" class="custom-control-input" value="BLKLN" required>
                                                <label class="custom-control-label" for="customRadioInline2">BLKLN</label>
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="col-md-12">
                                        <legend>Akun Login</legend>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Username <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Password <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="password" name="password" class="form-control" placeholder="*********" required="" />
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="col-md-12 mt-10">
                                        <legend>Data LPK/BLKLN</legend>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Nama LPK/BLKLN <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama LPK/BLKLN" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Alamat <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <textarea class="form-control" name="alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">No. Telepon <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="no_telepon" class="form-control" placeholder="No. Telepon" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Email <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">No. Izin <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="no_izin" class="form-control" placeholder="No. Izin" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Izin <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="date" name="tanggal_izin" class="form-control" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Jenis <span style="color:red" title="Wajib Diisi">*</span></label><br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline3" name="jenis" class="custom-control-input" value="Pemerintah" required>
                                                    <label class="custom-control-label" for="customRadioInline3">Pemerintah</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline4" name="jenis" class="custom-control-input" value="Swasta" required>
                                                    <label class="custom-control-label" for="customRadioInline4">Swasta</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline5" name="jenis" class="custom-control-input" value="Perusahaan" required>
                                                    <label class="custom-control-label" for="customRadioInline5">Perusahaan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Status Akreditas <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="status_akreditas" class="form-control" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">No. Akreditas <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="no_akreditas" class="form-control" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Ruang Lingkup <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="ruang_lingkup" class="form-control" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Logo Perusahaan</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="logo">
                                                    <label class="custom-file-label" for="customFile">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="col-md-12 mt-10">
                                        <legend>Data Pimpinan</legend>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Nama Pimpinan <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="nama_pimpinan" class="form-control" placeholder="Nama Pimpinan" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">No. Telepon Pimpinan <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="no_telepon_pimpinan" class="form-control" placeholder="(+62) ..." required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Nama Penanggung Jawab <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="nama_pj" class="form-control" placeholder="Nama Pimpinan" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Jabatan Penanggung Jawab <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="jabatan_pj" class="form-control" placeholder="Nama Pimpinan" required="" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">No. Telepon Penanggung Jawab <span style="color:red" title="Wajib Diisi">*</span></label>
                                                <input type="text" name="no_telepon_pj" class="form-control" placeholder="(+62) ..." required="" />
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="col-md-12 mt-10">
                                        <legend>Data Pengurus</legend>
                                        <table class="table table-striped">
                                            <center>
                                                <tr>
                                                    <!-- <th scope="col" rowspan="2">No.</th> -->
                                                    <th scope="col" rowspan="2" class="align-middle">Tipe</th>
                                                    <th scope="col" colspan="2">Jenis Kelamin</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Laki-laki</th>
                                                    <th scope="col">Perempuan</th>
                                                </tr>
                                                <tr>
                                                    <td>Karyawan</td>
                                                    <td><input type="number" name="karyawan_laki" class="form-control" value="0" required="" /></td>
                                                    <td><input type="number" name="karyawan_perempuan" class="form-control" value="0" required="" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Tenaga Pelatihan Tetap</td>
                                                    <td><input type="number" name="tpt_laki" class="form-control" value="0" required="" /></td>
                                                    <td><input type="number" name="tpt_perempuan" class="form-control" value="0" required="" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Tenaga Pelatihan Tidak Tetap</td>
                                                    <td><input type="number" name="tptt_laki" class="form-control" value="0" required="" /></td>
                                                    <td><input type="number" name="tptt_perempuan" class="form-control" value="0" required="" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Instruktur Tetap</td>
                                                    <td><input type="number" name="it_laki" class="form-control" value="0" required="" /></td>
                                                    <td><input type="number" name="it_perempuan" class="form-control" value="0" required="" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Instruktur Tidak Tetap</td>
                                                    <td><input type="number" name="itt_laki" class="form-control" value="0" required="" /></td>
                                                    <td><input type="number" name="itt_perempuan" class="form-control" value="0" required="" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Asesor Kompetensi</td>
                                                    <td><input type="number" name="ak_laki" class="form-control" value="0" required="" /></td>
                                                    <td><input type="number" name="ak_perempuan" class="form-control" value="0" required="" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Instruktur/Asesor WNA</td>
                                                    <td><input type="number" name="aw_laki" class="form-control" value="0" required="" /></td>
                                                    <td><input type="number" name="aw_perempuan" class="form-control" value="0" required="" /></td>
                                                </tr>
                                            </center>
                                        </table>
                                    </fieldset>
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

                <script type="text/javascript">
    // $(document).ready(function(){
        // $("#postingBtn").click(function(){
                // $("#postingBtn").attr("disabled", "disabled");
            // });
    // });
    function aktivasi(id){
        swal({
            title: "Apakah Anda Yakin Mengaktifkan Akun Ini ?",
            // text: "Data Akan Menjadi Aktif !",
            icon: "warning",
            buttons: true,
        })
        .then((result) => {
            if (result) {
                $.ajax({
                    url: '<?= base_url();?>Dashboard/aktivasiAkun',
                    type: 'POST',
                    data: {
                        "id" : id
                    },
                    dataType: "HTML",
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error!", "Please try again", "error");
                    },
                    success: function(data) {
                        swal("Success!", "Akun Berhasil Diaktifkan!", "success");
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }
                });
            } else {
            }
        });
    }

    function blokir(id){
        swal({
            title: "Apakah Anda Yakin Memblokir Akun Ini ?",
            // text: "Data Akan Menjadi Aktif !",
            icon: "warning",
            buttons: true,
        })
        .then((result) => {
            if (result) {
                $.ajax({
                    url: '<?= base_url();?>Dashboard/blokirAkun',
                    type: 'POST',
                    data: {
                        "id" : id
                    },
                    dataType: "HTML",
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error!", "Please try again", "error");
                    },
                    success: function(data) {
                        swal("Success!", "Akun Berhasil Diblokir!", "success");
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }
                });
            } else {
            }
        });
    }

    function hapusLPK(id){
        swal({
            title: "Apakah Anda Yakin?",
            text: "Semua Data Akan Terhapus Secara Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '<?php echo base_url();?>Dashboard/hapusAkun',
                    type: 'POST',
                    data: {
                        "id" : id
                    },
                    dataType: "HTML",
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    },
                    success: function(data) {
                        swal("Deleted!", "Akun Berhasil Dihapus!.", "success");
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }
                });
            } else {
            }
        });
    }
</script>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>