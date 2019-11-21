<!DOCTYPE html>
<!--[if IE 8]>         
<html class="no-js lt-ie9" lang="en">
<![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en">
<!--<![endif]-->
<?= $page["head"]; ?>
<?= $page['main_js'];?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url();?>">Pelatihan Kota Depok</a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto menusBar">

					<li class="nav-item"><a href="<?= base_url();?>" <?php if ($this->uri->segment(1) == '') { ?>
						class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Beranda</span></a></li>

						<li class="nav-item dropdown">
							<a <?php if ($this->uri->segment(2) == 'data' || $this->uri->segment(2) == 'pelatihan'  || $this->uri->segment(2) == 'pelatihanDetail'  || $this->uri->segment(2) == 'lpk'  || $this->uri->segment(2) == 'lpkDetail' || $this->uri->segment(2) == 'info' || $this->uri->segment(2) == 'infoDetail') { ?> class="nav-link dropdown-toggle nav-active" <?php }else{ ?> class="nav-link dropdown-toggle" <?php } ?> href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Data
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?= base_url(); ?>Home/lpk">LPK/BLKLN</a><!-- 
								<a class="dropdown-item" href="<?= base_url(); ?>Home/pelatihan">Jadwal</a>
								<a class="dropdown-item" href="<?= base_url(); ?>Home/info">Informasi</a> -->
							</div>
						</li>

						<li class="nav-item"><a href="<?= base_url();?>pendaftaran" <?php if ($this->uri->segment(1) == 'pendaftaran') { ?> class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Pendaftaran</span></a></li>

						<li class="nav-item"><a href="<?= base_url();?>login" <?php if ($this->uri->segment(1) == 'login') { ?> class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Login</span></a></li>

					</ul>
				</div>
			</div>
		</nav>

		<?= $content;?>

		<footer class="ftco-footer ftco-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Pelatihan <span class="text-info">Kota Depok</span></h2>
							<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<div class="rounded-social-buttons">
								<a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
								<a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
								<a class="social-button linkedin" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
								<a class="social-button youtube" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
								<a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Hubungi Kami</h2>
							<ul class="ul-footer">
								<li><i class="fas fa-envelope"></i> Email : <a href="#" class="text-info" target="_blank">disnakerkotadepok@gmail.com</a></li>
								<li><i class="fas fa-phone"></i> Phone : <a href="#" class="text-info" target="_blank">disnakerkotadepok@gmail.com</a></li>
								<li><i class="fas fa-map-marker"></i> Alamat : <a href="#" class="text-info" target="_blank">Jl. Margonda Raya No.54, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16431</a></li>
							</ul>

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Helpdesk</h2>
							<form method="POST" action="<?= base_url('Home/tambahHelpDesk'); ?>" class="text-center justify-content-center">
								<div class="form-group">
									<label>Tipe</label><br>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" value="umum" name="tipe">
										<label class="form-check-label" for="inlineCheckbox1">Umum</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" value="lpk" name="tipe">
										<label class="form-check-label" for="inlineCheckbox2">LPK/BLKLN</label>
									</div>
								</div>
								<!-- <div class="alert alert-success" role="alert">
									Berhasil Dikirim!
								</div> -->
								<?= $this->session->flashdata('notif'); ?>
								<div id="umum">
									<div class="form-group">
										<label>NIK</label>
										<input type="text" name="nik" class="form-control" placeholder="NIK">
									</div>
									<div class="form-group">
										<label>Status Pekerjaan</label><br>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inlineCheckbox3" value="Sudah Bekerja" name="status">
											<label class="form-check-label" for="inlineCheckbox1">Sudah Bekerja</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inlineCheckbox4" value="Belum Bekerja" name="status">
											<label class="form-check-label" for="inlineCheckbox2">Belum Bekerja</label>
										</div>
									</div>
								</div>
								<div class="form-group">
										<label>Nama <span id="lpk">LPK/BLKLN</span></label>
										<input type="text" name="nama" class="form-control" placeholder="Nama">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="example@mail.com">
								</div>
								<div class="form-group">
									<label>Masukan</label>
									<textarea class="form-control" name="masukan" placeholder="Isi Masukan Anda Disini" rows="5"></textarea>		
								</div>
								<button type="submit" class="btn btn-success float-right">Kirim</button>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="https://fraismediatech.com" target="_blank"><span class="text-info">Frais Mediatech</span></a>
						</p>
					</div>
				</div>
			</div>
		</footer>
		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
	</body>
	<script src="<?= base_url();?>assets/home/js/aos.js"></script>
	<script src="<?= base_url();?>assets/home/js/main.js"></script>
	<script type="text/javascript">
		$("#umum").hide();
		$("#lpk").hide();
		$('input[type="radio"][name="tipe"]').on('click', function(){
			if (this.value == 'umum') {
				$("#umum").show();
				$("#lpk").hide();
			} else if (this.value == 'lpk') {
				$("#umum").hide();
				$("#lpk").show();
			}
		});
	</script>
	</html>