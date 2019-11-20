<script type="text/javascript">
	function hapus(){

		swal({
			title: "Warning",
			text: "Apa Data Ingin Dihapus?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				// $.ajax({
				// 	url: '<?= base_url();?>pengurus/addNew',
				// 	type: 'POST',
				// 	data: {
				// 		"kode" : kode, "nama" : nama, "bank" : bank, "cicilan" : cicilan, "level" : lv, "fase" : fase
				// 	},
				// 	dataType: "HTML",
				// 	error: function (xhr, ajaxOptions, thrownError) {
				// 		swal("Error!", "Please try again", "error");
				// 	},
				// 	success: function(data) {
				// 		swal("Success!", "Berhasil Menambah Kelompok!", "success");
				// 		setTimeout(function() {
				// 			window.location.reload();
				// 		}, 1000);
				// 	}
				// });
			} else {
			}
		});
	}
</script>

<!-- begin footer -->
<!-- <footer class="footer">
	<div class="row">
		<div class="col-12 col-sm-6 text-center text-sm-left">
			<p>&copy; Copyright 2019. All rights reserved.</p>
		</div>
		<div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
			<p>Powered by <a href="https://fraismediatech.com" target="_blank">Frais Mediatech</a></p>
		</div>
	</div>
</footer> -->
<!-- end footer -->