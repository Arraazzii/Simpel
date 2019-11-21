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
</style>
<?= $this->session->flashdata('notif');?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Laporan</h4>
                </div>
                <div class="float-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalCetak">Update Laporan</button>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th width="2%">No.</th>
                                <th>Tanggal Lapor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($laporan as $row) { ?>
                                <td><?= $no++; ?></td>
                                <td><?= $row->tanggal_lapor; ?></td>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModalCetak">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Laporan LPK / BLKLN</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('DashboardLPK/updateLaporan'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
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
                                <label class="control-label">Program Yang Ditawarkan <span style="color:red" title="Wajib Diisi">*</span></label>
                                <input type="text" name="program" class="form-control" required="" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Foto Kegiatan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="kegiatan">
                                    <label class="custom-file-label" for="customFile">Pilih File</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Daftar Absensi Pelatihan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="absensi">
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
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>