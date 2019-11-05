<div class="row">
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
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>example@gmail.com</td>
                                <td><span class="badge badge-success">Berita</span></td>
                                <td><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit">Edit</button> <button class="btn btn-danger btn-sm" type="button" onclick="hapus()">Delete</button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>example@gmail.com</td>
                                <td><span class="badge badge-success">Berita</span></td>
                                <td><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit">Edit</button> <button class="btn btn-danger btn-sm" type="button" onclick="hapus()">Delete</button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>example@gmail.com</td>
                                <td><span class="badge badge-success">Event</span></td>
                                <td><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit">Edit</button> <button class="btn btn-danger btn-sm" type="button" onclick="hapus()">Delete</button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>example@gmail.com</td>
                                <td><span class="badge badge-success">Event</span></td>
                                <td><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit">Edit</button> <button class="btn btn-danger btn-sm" type="button" onclick="hapus()">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- The Modal -->
                    <div class="modal" id="myModalEdit">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Modal Edit</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="" class="form-control" placeholder="Judul">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control">
                                    <option>Berita</option>
                                    <option>Event</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Simpan</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal" id="myModalTambah">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Tambah Informasi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="" class="form-control" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control">
                            <option>Berita</option>
                            <option>Event</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Simpan</button>
                </div>

            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>