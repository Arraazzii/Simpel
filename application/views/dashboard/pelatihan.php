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
                    <table id="datatable1" class="display compact table table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelatihan</th>
                                <th>Jenis Pelatihan</th>
                                <th>Tanggal Pelatihan</th>
                                <th>Kuota</th>
                                <th>Peserta Lulus</th>
                                <th>Status</th>
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
                                    <td>
                                        <?= date('d M Y', strtotime($row->tanggal_mulai_pelatihan)); ?> - <?= date('d M Y', strtotime($row->tanggal_berakhir_pelatihan)); ?>  
                                    </td>
                                    <td><?= $row->kuota; ?></td>
                                    <td id="luluskan<?= $row->kode_pelatihan; ?>">
                                        <?php 
                                        $peserta_lulus = $this->db->query("SELECT * FROM table_peserta AS b JOIN table_peserta_pelatihan AS a ON a.nik = b.nik JOIN table_pelatihan AS c ON c.kode_pelatihan = a.kode_pelatihan WHERE a.kode_pelatihan = '".$row->kode_pelatihan."' AND a.status = '1'")->num_rows();
                                        echo $peserta_lulus;
                                        ?>
                                    </td>
                                    <td id="statuspelatihan<?= $row->kode_pelatihan; ?>">
                                        <?php if ($row->status == 'Aktif') { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Tidak Aktif</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($row->status == 'Aktif') { ?>
                                            <button class="btn btn-danger btn-sm" onclick="nonaktifkan('<?= $row->kode_pelatihan; ?>')" id="nonaktif<?= $row->kode_pelatihan; ?>">Non Aktifkan</button>
                                            <button class="btn btn-success btn-sm batalkan" onclick="aktifkan('<?= $row->kode_pelatihan; ?>')" id="aktif<?= $row->kode_pelatihan; ?>">Aktifkan</button>
                                        <?php } else { ?>
                                            <button class="btn btn-success btn-sm" onclick="aktifkan('<?= $row->kode_pelatihan; ?>')" id="aktif<?= $row->kode_pelatihan; ?>">Aktifkan</button>
                                            <button class="btn btn-danger btn-sm batalkan" onclick="nonaktifkan('<?= $row->kode_pelatihan; ?>')" id="nonaktif<?= $row->kode_pelatihan; ?>">Non Aktifkan</button>
                                        <?php } ?>
                                        <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit<?= $row->kode_pelatihan; ?>">Detail</button>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="hapusPelatihan('<?= $row->kode_pelatihan; ?>')">Delete</button>
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
                    <h4 class="modal-title">Detail Pelatihan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="tab tab-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile<?= $row->kode_pelatihan; ?>" role="tab" aria-controls="profile" aria-selected="true"> <i class="fa fa-home"></i> Data</a>
                            </li>
                            <li class="nav-item" id="listpeserta<?= $row->kode_pelatihan; ?>" <?php if ($row->status != 'Aktif') { echo 'style="display:none"';};?>>
                                <a class="nav-link" id="pengurus-tab" data-toggle="tab" href="#pengurus<?= $row->kode_pelatihan; ?>" role="tab" aria-controls="pengurus" aria-selected="false"><i class="fa fa-user"></i> Calon Peserta </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile<?= $row->kode_pelatihan; ?>" role="tabpanel" aria-labelledby="profile-tab">
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
                            <div class="tab-pane fade" id="pengurus<?= $row->kode_pelatihan; ?>" role="tabpanel" aria-labelledby="pengurus-tab">
                                <div class="table-responsive">
                                    <table id="datatable2" class="display compact table table-hover table-striped text-center">
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
                                                            <button class="btn btn-warning btn-sm" type="button" onclick="click_data(<?= $res->id; ?>)" id="detailPeserta<?= $res->id; ?>">Detail</button>
                                                            <button tipe="button" class="btn btn-success btn-sm" id="lulus<?= $res->nik; ?>" onclick="luluskan('<?= $res->nik; ?>', '<?= $row->kode_pelatihan; ?>', '<?= $res->id; ?>', '<?= $res->status; ?>')">Lulus</button>
                                                            <button tipe="button" class="btn btn-danger btn-sm batalkan" id="batal<?= $res->nik; ?>" onclick="batalkan('<?= $res->nik; ?>', '<?= $row->kode_pelatihan; ?>', '<?= $res->id; ?>', '<?= $res->status; ?>')">Batalkan</button>
                                                        <?php } else { ?>
                                                            <button class="btn btn-warning btn-sm" type="button" onclick="click_data(<?= $res->id; ?>)" id="detailPeserta<?= $res->id; ?>">Detail</button>
                                                            <button tipe="button" class="btn btn-danger btn-sm" id="batal<?= $res->nik; ?>" onclick="batalkan('<?= $res->nik; ?>', '<?= $row->kode_pelatihan; ?>', '<?= $res->id; ?>', '<?= $res->status; ?>')">Batalkan</button>
                                                            <button tipe="button" class="btn btn-success btn-sm batalkan" id="lulus<?= $res->nik; ?>" onclick="luluskan('<?= $res->nik; ?>', '<?= $row->kode_pelatihan; ?>', '<?= $res->id; ?>', '<?= $res->status; ?>')">Lulus</button>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                                <script type="text/javascript">
                                                    $(document).ready(function(){
                                                        $('#detail<?= $res->id; ?>').hide();

                                                    });
                                                </script>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                $no = 1; 
                                $Pesertapelatihan = $this->db->query("SELECT *, b.nama AS np FROM table_peserta AS b JOIN table_peserta_pelatihan AS a ON a.nik = b.nik JOIN table_pelatihan AS c ON c.kode_pelatihan = a.kode_pelatihan JOIN table_alamat AS d ON b.kode_alamat = d.kode_alamat WHERE a.kode_pelatihan = '$row->kode_pelatihan' ORDER BY a.id DESC")->result();
                                foreach ($Pesertapelatihan as $res) { ?>
                                    <div id="detail<?= $res->id; ?>" class="col-md-12 umpet">
                                        <div class="card-heading">
                                            <h4>Detail Peserta</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="peserta<?= $res->id; ?>" class="table table-hover display" width="100%">
                                                <tr id="nik<?= $res->id ?>">
                                                    <td width="30%">NIK</td>
                                                    <td width="5%">:</td>
                                                    <td width="65%"><?= $res->nik?></td>
                                                </tr>
                                                <tr id="nama<?= $res->id ?>">
                                                    <td width="30%">Nama Peserta</td>
                                                    <td width="5%">:</td>
                                                    <td width="65%"><?= $res->np?></td>
                                                </tr>
                                                <tr id="jenis<?= $res->id ?>">
                                                    <td width="30%">Jenis Kelamin</td>
                                                    <td width="5%">:</td>
                                                    <td width="65%"><?= $res->jenis_kelamin?></td>
                                                </tr>
                                                <tr id="jenis<?= $res->id ?>">
                                                    <td width="30%">Email</td>
                                                    <td width="5%">:</td>
                                                    <td width="65%"><?= $res->email?></td>
                                                </tr>
                                                <tr id="jenis<?= $res->id ?>">
                                                    <td width="30%">No. Telepon</td>
                                                    <td width="5%">:</td>
                                                    <td width="65%"><?= $res->no_telepon?></td>
                                                </tr>
                                                <tr id="jenis<?= $res->id ?>">
                                                    <td width="30%">Status Pekerjaan</td>
                                                    <td width="5%">:</td>
                                                    <td width="65%"><?= $res->status_pekerjaan?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
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
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
    function click_data(id){
        $('.umpet').hide();
        $('#detail'+id).show();
    }
</script>
<script type="text/javascript">

    $("#datatable2").dataTable();

    $("#datatable1").dataTable({
        "dom": 'Bfrtip',
        "buttons": [
        {
            extend: 'excelHtml5',
            text: 'Export Excel',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
            },
        },
        ],
        language: {
            "decimal":        "",
            "emptyTable":     "Data Tidak Tersedia Di Table",
            "info":           "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Data",
            "infoEmpty":      "Menampilkan 0 Sampai 0 Dari 0 Data",
            "infoFiltered":   "(Dari Total _MAX_ Data)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Menampilkan _MENU_ Data",
            "loadingRecords": "Loading...",
            "processing":     "Memproses...",
            "search":         "Cari :",
            "zeroRecords":    "Tidak Ada Data Yang Sesuai",
            "paginate": {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       ">",
                "previous":   "<"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        },
    });

    $(".batalkan").hide();
    function aktifkan(idPelatihan){
        $.ajax({
            url: '<?= base_url();?>Dashboard/aktifkanPelatihan',
            type: 'POST',
            data: {
                idPelatihan : idPelatihan,
            },
            dataType: "JSON",
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", "Please try again", "error");
            },
            success: function(data) {
                if (data === 'ok') {
                    $("#aktif" + idPelatihan).hide();
                    $("#nonaktif" + idPelatihan).show();
                    $("#listpeserta" + idPelatihan).show();
                    document.getElementById("statuspelatihan" + idPelatihan).innerHTML = '<span class="badge badge-success">Aktif</span>';
                }else{

                }
            }
        });
    }

    function nonaktifkan(idPelatihan){
        $.ajax({
            url: '<?= base_url();?>Dashboard/nonAktifkanPelatihan',
            type: 'POST',
            data: {
                idPelatihan : idPelatihan,
            },
            dataType: "JSON",
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", "Please try again", "error");
            },
            success: function(data) {
                if (data === 'ok') {
                    $("#aktif" + idPelatihan).show();
                    $("#nonaktif" + idPelatihan).hide();
                    $("#listpeserta" + idPelatihan).hide();
                    document.getElementById("statuspelatihan" + idPelatihan).innerHTML = '<span class="badge badge-danger">Tidak Aktif</span>';
                }else{

                }
            }
        });
    }


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
                    $.ajax({
                        url: '<?= base_url();?>Dashboard/pesertaLulus',
                        type: 'POST',
                        data: {
                            idUser : idUser, idPelatihan : idPelatihan, id : id, status : status
                        },
                        dataType: "JSON",
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error!", "Please try again", "error");
                        },
                        success: function(data) {
                            if (data != '0') {
                                document.getElementById("luluskan" + idPelatihan).innerHTML = data;
                            }else{
                                document.getElementById("luluskan" + idPelatihan).innerHTML = '0';
                            }
                        }
                    });
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
                    $.ajax({
                        url: '<?= base_url();?>Dashboard/pesertaLulus',
                        type: 'POST',
                        data: {
                            idUser : idUser, idPelatihan : idPelatihan, id : id, status : status
                        },
                        dataType: "JSON",
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error!", "Please try again", "error");
                        },
                        success: function(data) {
                            if (data != '0') {
                                document.getElementById("luluskan" + idPelatihan).innerHTML = data;
                            }else{
                                document.getElementById("luluskan" + idPelatihan).innerHTML = '0';
                            }
                        }
                    });
                    document.getElementById("statususer" + idUser).innerHTML = '<span class="badge badge-warning">Belum Lulus!</span>';
                }else{

                }
            }
        });
    }
</script>