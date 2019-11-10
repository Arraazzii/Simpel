<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="<?= $title; ?>" />
    <meta name="author" content="Frais Mediatech" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/dashboard/img/logo-icon.png">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dashboard/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dashboard/css/style.css" />
    <?= $this->session->flashdata('notif'); ?>
</head>
<style type="text/css">
    @media(max-width: 767px){
        .media-hide{
            display: none !important;
        }
    }
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
<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="<?= base_url(); ?>assets/dashboard/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-5">
                        <div class="row justify-content-center">
                            <div class="d-flex align-items-center card col-lg-7">
                                <div class="login p-50">
                                    <h1 class="mb-2 text-center">Pendaftaran</h1>
                                    <p class="text-center">Selamat Datang Di Website Pelatihan Kota Depok, Silahkan Masukan Data Anda Dengan Lengkap</p>
                                    <form action="<?= base_url('Login/daftar'); ?>" method="POST" enctype="multipart/form-data" class="mt-2 mt-sm-4">
                                        <div class="row">
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
                                                <table class="table table-striped table-bordered">
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
                                            <div class="col-12 mt-3 text-center">
                                                <button type="submit" class="btn btn-primary text-uppercase">Daftar</button>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <p>Sudah Punya Akun ? <a href="<?= base_url(); ?>login">Login</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    <script src="<?= base_url(); ?>assets/dashboard/js/vendors.js"></script>
    <!-- custom app -->
    <script src="<?= base_url(); ?>assets/dashboard/js/app.js"></script>
    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
</body>
</html>