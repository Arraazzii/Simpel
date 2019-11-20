<div class="row">
    <?= $this->session->flashdata('notif');?>
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Informasi Terbaru</h4>
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
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($berita as $row) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->judul; ?></td>
                                <td><?= $row->detail; ?></td>
                                <td><span class="badge badge-success"><?= $row->tipe; ?></span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit<?= $row->id; ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm" type="button" onclick="hapus('<?= $row->id; ?>')">Delete</button>
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

<?php foreach ($berita as $row) { ?>
<!-- The Modal -->
<div class="modal" id="myModalEdit<?= $row->id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url('Dashboard/editBerita');?>" method="POST" enctype="multipart/form-data">
                <!-- Modal body -->
                <div class="modal-body">
                    <center><img src="<?= base_url(); ?>assets/upload/berita/<?= $row->photo; ?>" class="col-lg-6 img-fluid" style="padding:20px"></center>
                    <div class="form-group">
                            <label>Tipe</label>
                            <select class="form-control" name="tipe" required="">
                                <option hidden value="">Silahkan Pilih</option>
                                <option value="Berita" <?php if ($row->tipe == 'Berita') { echo 'selected'; } ?>>Berita</option>
                                <option value="Events" <?php if ($row->tipe == 'Events') { echo 'selected'; } ?>>Events</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?= $row->judul; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi"><?= $row->detail; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" required="">
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
<?php } ?>

<!-- The Modal -->
<div class="modal" id="myModalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Berita/Events</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url('Dashboard/tambahBerita'); ?>" method="POST" enctype="multipart/form-data">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipe</label>
                        <select class="form-control" name="tipe" required="">
                            <option hidden value="">Silahkan Pilih</option>
                            <option value="Berita">Berita</option>
                            <option value="Events">Events</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul" required="">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" required="">
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