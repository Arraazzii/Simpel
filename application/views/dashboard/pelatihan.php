<div class="row">
    <?= $this->session->flashdata('notif');?>
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data Pelatihan</h4>
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
                                <th>Pelatihan</th>
                                <th>Jenis Pelatihan</th>
                                <th>Kuota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; 
                            foreach ($pelatihan as $row) { ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->jenis; ?></td>
                                    <td><?= $row->kuota; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit<?= $row->kode_pelatihan; ?>">Detail</button>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="hapus()">Delete</button>
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
foreach ($pelatihan as $row) { ?>
    <!-- The Modal -->
    <div class="modal" id="myModalEdit<?= $row->kode_pelatihan; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pelatihan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="tab tab-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"> <i class="fa fa-home"></i> Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pengurus-tab" data-toggle="tab" href="#pengurus" role="tab" aria-controls="pengurus" aria-selected="false"><i class="fa fa-user"></i> Peserta </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form action="<?= base_url('Dashboard/ubahPelatihan');?>" method="POST">
                                    <div class="form-group">
                                        <label>Nama Pelatihan</label>
                                        <input type="hidden" name="id" value="<?= $row->kode_pelatihan; ?>">
                                        <input type="text" name="nama" value="<?= $row->nama; ?>" class="form-control" placeholder="Nama Pelatihan">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pelatihan</label>
                                        <select class="form-control" name="jenis">
                                            <option hidden="" value="">Silahkan Pilih</option>
                                            <?php foreach ($jenis as $res): ?>
                                                <option value="<?= $res->kode_jenis; ?>" <?php if ($row->kode_jenis == $res->kode_jenis) { echo 'selected'; } ?>><?= $res->jenis; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kuota</label>
                                        <input type="number" name="kuota" value="<?= $row->kuota; ?>" class="form-control" placeholder="Kuota Pelatihan">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="kategori">
                                            <option hidden="" value="">Silahkan Pilih</option>
                                            <?php foreach ($kategori as $res): ?>
                                                <option value="<?= $res->kode_kategori; ?>" <?php if ($row->kode_kategori == $res->kode_kategori) { echo 'selected'; } ?>><?= $res->kategori; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Standar Kompetensi</label>
                                        <textarea class="form-control" name="standar"><?= $row->standar_kompetensi; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="ket"><?= $row->keterangan; ?></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label>Tanggal Mulai Pendaftaran</label>
                                                <input type="date" name="tgl_mulai_daftar" class="form-control" value="<?= $row->tanggal_mulai_daftar; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label>Tanggal Berakhir Pendaftaran</label>
                                                <input type="date" name="tgl_akhir_daftar" class="form-control" value="<?= $row->tanggal_berakhir_daftar; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label>Tanggal Mulai Pelatihan</label>
                                                <input type="date" name="tgl_mulai_pel" class="form-control" value="<?= $row->tanggal_mulai_pelatihan; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label>Tanggal Berakhir Pelatihan</label>
                                                <input type="date" name="tgl_akhir_pel" class="form-control"  value="<?= $row->tanggal_berakhir_pelatihan; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Simpan</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pengurus" role="tabpanel" aria-labelledby="pengurus-tab">
                                <table id="datatable" class="display compact table table-hover table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peserta</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1; 
                                        $Pesertapelatihan = $this->db->query("SELECT a.id AS id, b.nik AS nik, b.nama AS nama, a.tanggal_daftar AS tanggal_daftar, a.status AS status FROM table_peserta AS b JOIN table_peserta_pelatihan AS a ON a.nik = b.nik JOIN table_pelatihan AS c ON c.kode_pelatihan = a.kode_pelatihan WHERE a.kode_pelatihan = '$row->kode_pelatihan' ORDER BY a.id DESC")->result();
                                        foreach ($Pesertapelatihan as $res) { ?>
                                            <tr>
                                                <td><?= $no++; ?>.</td>
                                                <td><?= $res->nama; ?></td>
                                                <td><?= $res->tanggal_daftar; ?></td>
                                                <td id="statususer<?= $res->nik; ?>">
                                                    <?php if ($res->status == 0) { ?>
                                                        <span class="badge badge-warning">Belum Lulus</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">Lulus</span>
                                                    <?php } ?>    
                                                </td>
                                                <td>
                                                    <?php if ($res->status == 0) { ?>
                                                        <button tipe="button" class="btn btn-success btn-sm" id="lulus<?= $res->nik; ?>" onclick="luluskan('<?= $res->nik; ?>', '<?= $row->kode_pelatihan; ?>', '<?= $res->id; ?>', '<?= $res->status; ?>')">Lulus</button>
                                                        <button tipe="button" class="btn btn-danger btn-sm batalkan" id="batal<?= $res->nik; ?>" onclick="batalkan('<?= $res->nik; ?>', '<?= $row->kode_pelatihan; ?>', '<?= $res->id; ?>', '<?= $res->status; ?>')">Batalkan</button>
                                                    <?php } else { ?>
                                                        <button tipe="button" class="btn btn-danger btn-sm" id="batal<?= $res->nik; ?>" onclick="batalkan('<?= $res->nik; ?>', '<?= $row->kode_pelatihan; ?>', '<?= $res->id; ?>', '<?= $res->status; ?>')">Batalkan</button>
                                                        <button tipe="button" class="btn btn-success btn-sm batalkan" id="lulus<?= $res->nik; ?>" onclick="luluskan('<?= $res->nik; ?>', '<?= $row->kode_pelatihan; ?>', '<?= $res->id; ?>', '<?= $res->status; ?>')">Lulus</button>
                                                    <?php } ?> 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                   
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- The Modal -->
<div class="modal" id="myModalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pelatihan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url('Dashboard/tambahPelatihan');?>" method="POST">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pelatihan</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Pelatihan">
                    </div>
                    <div class="form-group">
                        <label>Jenis Pelatihan</label>
                        <select class="form-control" name="jenis">
                            <option hidden="" value="">Silahkan Pilih</option>
                            <?php foreach ($jenis as $row): ?>
                                <option value="<?= $row->kode_jenis; ?>"><?= $row->jenis; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kuota</label>
                        <input type="number" name="kuota" class="form-control" placeholder="Kuota Pelatihan">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori">
                            <option hidden="" value="">Silahkan Pilih</option>
                            <?php foreach ($kategori as $row): ?>
                                <option value="<?= $row->kode_kategori; ?>"><?= $row->kategori; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Standar Kompetensi</label>
                        <textarea class="form-control" name="standar"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="ket"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label>Tanggal Mulai Pendaftaran</label>
                                <input type="date" name="tgl_mulai_daftar" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label>Tanggal Berakhir Pendaftaran</label>
                                <input type="date" name="tgl_akhir_daftar" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label>Tanggal Mulai Pelatihan</label>
                                <input type="date" name="tgl_mulai_pel" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label>Tanggal Berakhir Pelatihan</label>
                                <input type="date" name="tgl_akhir_pel" class="form-control">
                            </div>
                        </div>
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

<script type="text/javascript">
    $(".batalkan").hide();
    function luluskan(idUser, idPelatihan, id, status){
        $.ajax({
            url: '<?= base_url();?>Dashboard/lulusPeserta',
            type: 'POST',
            data: {
                idUser : idUser, idPelatihan : idPelatihan, id : id, status : status
            },
            dataType: "JSON",
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", "Please try again", "error");
            },
            success: function(data) {
                if (data === 'ok') {
                    $("#lulus" + idUser).hide();
                    $("#batal" + idUser).show();
                    document.getElementById("statususer" + idUser).innerHTML = '<span class="badge badge-success">Lulus!</span>';
                }else{

                }
            }
        });
    }

    $(".batalkan").hide();
    function batalkan(idUser, idPelatihan, id, status){
        $.ajax({
            url: '<?= base_url();?>Dashboard/batalPeserta',
            type: 'POST',
            data: {
                idUser : idUser, idPelatihan : idPelatihan, id : id, status : status
            },
            dataType: "JSON",
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", "Please try again", "error");
            },
            success: function(data) {
                if (data === 'ok') {
                    $("#lulus" + idUser).show();
                    $("#batal" + idUser).hide();
                    document.getElementById("statususer" + idUser).innerHTML = '<span class="badge badge-warning">Belum Lulus!</span>';
                }else{

                }
            }
        });
    }
</script>