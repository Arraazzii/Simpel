<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="<?php echo $title; ?>" />
    <meta name="author" content="Frais Mediatech" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dashboard/img/logo-icon.png">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/style.css" />
</head>
<style type="text/css">
@media(max-width: 767px){
    .media-hide{
        display: none !important;
    }
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
                        <img src="<?php echo base_url(); ?>assets/dashboard/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-5">
                        <div class="row justify-content-center">
                            <div class="d-flex align-items-center card col-lg-5">
                                <div class="login p-50">
                                    <h1 class="mb-2 text-center">Pendaftaran</h1>
                                    <p class="text-center">Selamat Datang Di Website Pelatihan Kota Depok, Silahkan Masukan Data Anda Dengan Lengkap</p>
                                    <form action="#" class="mt-2 mt-sm-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Type Akun *</label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline1">LPK</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">BLKLN</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Username *</label>
                                                    <input type="text" class="form-control" placeholder="Username Anda" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Email *</label>
                                                    <input type="email" class="form-control" placeholder="Email " />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password*</label>
                                                    <input type="password" class="form-control" placeholder="*********" />
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <a href="<?php echo base_url(); ?>dashboardLPK" class="btn btn-primary text-uppercase">Daftar</a>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <p>Sudah Punya Akun ?<a href="<?php echo base_url(); ?>login"> Login</a></p>
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
    <script src="<?php echo base_url(); ?>assets/dashboard/js/vendors.js"></script>
    <!-- custom app -->
    <script src="<?php echo base_url(); ?>assets/dashboard/js/app.js"></script>
</body>
</html>