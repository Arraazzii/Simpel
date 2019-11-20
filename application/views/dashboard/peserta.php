<style type="text/css">
    .dataTables_wrapper .dt-buttons {
      margin-bottom: -30px
  }
</style>
<div class="row">
    <?= $this->session->flashdata('notif');?>
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Peserta</h4>
                </div>
                <div class="float-right">
                    <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalTambah">Tambah</button> -->
                </div>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatablePeserta" class="display compact table table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Status Kerja</th>
                                <th>Pelatihan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; 
                            foreach ($pesertaPelatihan as $row) { ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->hp; ?></td>
                                    <td><?= $row->alamat; ?> <?= $row->kec; ?> <?= $row->kel; ?></td>
                                    <td>
                                        <?php if ($row->status == 'Sudah Bekerja') { ?>
                                            <span class="badge badge-success">Bekerja</span>
                                        <?php } else { ?>
                                            <span class="badge badge-warning">Belum Bekerja</span>
                                        <?php } ?>                                        
                                    </td>
                                    <td><?= $row->nama_pelatihan; ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit<?= $row->nik; ?>">Edit</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Pelatihan</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$no = 1; 
foreach ($pesertaPelatihan as $row) { ?>
    <!-- The Modal -->
    <div class="modal" id="myModalEdit<?= $row->nik; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Peserta</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="<?= base_url('Dashboard/ubahPeserta');?>" method="POST">
                    <input type="hidden" name="id" value="<?= $row->nik; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Status Bekerja</label>
                            <select class="form-control" name="status_pekerjaan" id="status_pekerjaan<?= $row->nik; ?>">
                                <option value="Sudah Bekerja" <?php if($row->status == 'Sudah Bekerja') {echo 'Selected';}?>>Sudah Bekerja</option>
                                <option value="Belum Bekerja" <?php if($row->status == 'Belum Bekerja') {echo 'Selected';}?>>Belum Bekerja</option>
                            </select>
                        </div>
                        <div id="popup<?= $row->nik; ?>">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Perusahaan" value="<?= $row->nama_perusahaan; ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Perushaan</label>
                                <textarea class="form-control" name="alamat"><?= $row->alamat_perusahaan; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon Perusahaan</label>
                                <input type="text" name="telp" class="form-control" placeholder="No. Telepon Perusahaan" value="<?= $row->no_telp_perusahaan; ?>">
                            </div>
                        </div>
                        <script type="text/javascript">
                            <?php if($row->status == 'Belum Bekerja') { ?>
                                $("#popup<?= $row->nik; ?>").hide();
                            <?php } ?>
                            $('#status_pekerjaan<?= $row->nik; ?>').on('change', function(){
                                if($('#status_pekerjaan<?= $row->nik; ?>').val() == 'Sudah Bekerja') {
                                    $("#popup<?= $row->nik; ?>").show(); 
                                } else {
                                    $("#popup<?= $row->nik; ?>").hide();
                                }
                            });
                        </script>
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
<?php } ?>

<!-- The Modal -->
<!-- <div class="modal" id="myModalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            Modal Header
            <div class="modal-header">
                <h4 class="modal-title">Modal Tambah Peserta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            Modal body
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Peserta</label>
                    <input type="text" name="" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label>Status Bekerja</label>
                    <select class="form-control">
                        <option>Bekerja</option>
                        <option>Tidak Bekerja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>No Hp Peserta</label>
                    <input type="number" name="" class="form-control" placeholder="No Hp">
                </div>
                <div class="form-group">
                    <label>Kelurahan</label>
                    <select class="form-control">
                        <option>Cilodong</option>
                        <option>Tapos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control">
                        <option>Cilodong</option>
                        <option>Tapos</option>
                    </select>
                </div>
            </div>
            Modal footer
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div> -->

<script type="text/javascript">
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
</script>
<script type="text/javascript">
    $("#datatablePeserta").dataTable({
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
        initComplete: function () {
            this.api().columns([5]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                .appendTo( $(column.header()).empty() )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                        );
                    column
                    .search( val ? '^'+val+'$' : '', true, false )
                    .draw();
                } );
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        "dom": 'Bfrtip',
        "buttons": [
        {
            extend: 'excelHtml5',
            text: 'Export Excel',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5 ]
            },
        },
        ],
    });
</script>