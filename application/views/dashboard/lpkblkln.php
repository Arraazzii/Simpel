<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">LPK / BLKLN</h4>
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
                                <th>Nama Lembaga</th>
                                <th>Daftar Kegiatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>example@gmail.com</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit">Edit</button> <button class="btn btn-danger btn-sm" type="button" onclick="hapus()">Delete</button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>example@gmail.com</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit">Edit</button> <button class="btn btn-danger btn-sm" type="button" onclick="hapus()">Delete</button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>example@gmail.com</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#myModalEdit">Edit</button> <button class="btn btn-danger btn-sm" type="button" onclick="hapus()">Delete</button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>example@gmail.com</td>
                                <td><span class="badge badge-success">Aktif</span></td>
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
                            <div class="tab tab-border nav-center">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"> <i class="fa fa-home"></i> Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false"><i class="fa fa-user"></i> Detail </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group">
                                            <label>Nama Lembaga</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>No Registrasi</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>No Tanda Daftar</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelembagaan</label>
                                            <select class="form-control">
                                                <option>Pemerintah</option>
                                                <option>Swasta</option>
                                                <option>Perusahaan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Direktur Lembaga</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>No Direktur Lembaga</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Penanggung Jawab Lembaga</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <select class="form-control">
                                                        <option>Kec 1</option>
                                                        <option>Kec 2</option>
                                                        <option>Kec 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Kelurahan</label>
                                                    <select class="form-control">
                                                        <option>Kel 1</option>
                                                        <option>Kel 2</option>
                                                        <option>Kel 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pemilik</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Email</label>
                                            <input type="email" name="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Tanggal Pendirian</label>
                                                    <input type="date" name="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Tanggal Izin Lembaga</label>
                                                    <input type="date" name="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>No. Telepon</label>
                                                    <input type="text" name="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>No. Sertifikasi</label>
                                                    <input type="text" name="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Upload Bukti Izin .pdf</label>
                                                    <input type="file" name="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Upload MoU .pdf</label>
                                                    <input type="file" name="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Upload Gambar Lembaga</label>
                                                    <input type="file" name="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group form-check">
                                                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
                                                    <label class="form-check-label" for="disabledFieldsetCheck">
                                                        Status Terakreditasi
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                        <div class="accordion" id="accordionsimplefill">
                                            <div class="mb-2 acd-group">
                                                <div class="card-header bg-primary rounded-0">
                                                    <h5 class="mb-0">
                                                        <a href="#collapse" class="btn-block text-white text-left acd-heading" data-toggle="collapse">Lembaga</a>
                                                    </h5>
                                                </div>
                                                <div id="collapse" class="collapse show" data-parent="#accordionsimplefill">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Ruang Lingkup Lembaga</label>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Uji Kompetensi Lembaga</label>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 acd-group">
                                                <div class="card-header rounded-0 bg-primary">
                                                    <h5 class="mb-0">
                                                        <a href="#collapse2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Tenaga Kerja Tetap</a>
                                                    </h5>
                                                </div>
                                                <div id="collapse2" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Laki - Laki</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Perempuan</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 acd-group border-bottom-0">
                                                <div class="card-header rounded-0 bg-primary">
                                                    <h5 class="mb-0">
                                                        <a href="#collapse3" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Tenaga Kerja Tidak Tetap</a>
                                                    </h5>
                                                </div>
                                                <div id="collapse3" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Laki - Laki</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Perempuan</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 acd-group border-bottom-0">
                                                <div class="card-header rounded-0 bg-primary">
                                                    <h5 class="mb-0">
                                                        <a href="#collapse4" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Instruktur Tetap</a>
                                                    </h5>
                                                </div>
                                                <div id="collapse4" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Laki - Laki</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Perempuan</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 acd-group border-bottom-0">
                                                <div class="card-header rounded-0 bg-primary">
                                                    <h5 class="mb-0">
                                                        <a href="#collapse5" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Instruktur Tidak Tetap</a>
                                                    </h5>
                                                </div>
                                                <div id="collapse5" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Laki - Laki</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Perempuan</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 acd-group border-bottom-0">
                                                <div class="card-header rounded-0 bg-primary">
                                                    <h5 class="mb-0">
                                                        <a href="#collapse6" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Asesor Kompetensi</a>
                                                    </h5>
                                                </div>
                                                <div id="collapse6" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Laki - Laki</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Perempuan</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 acd-group border-bottom-0">
                                                <div class="card-header rounded-0 bg-primary">
                                                    <h5 class="mb-0">
                                                        <a href="#collapse7" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Asesor Instruksi Asing</a>
                                                    </h5>
                                                </div>
                                                <div id="collapse7" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Laki - Laki</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Perempuan</label>
                                                                    <input type="number" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
                    <h4 class="modal-title">Modal Tambah LPK / BLKNL</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="tab tab-border nav-center">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="true"> <i class="fa fa-home"></i> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="detail-tab2" data-toggle="tab" href="#detail2" role="tab" aria-controls="detail" aria-selected="false"><i class="fa fa-user"></i> Detail </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile2" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="form-group">
                                    <label>Nama Lembaga</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No Registrasi</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No Tanda Daftar</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelembagaan</label>
                                    <select class="form-control">
                                        <option>Pemerintah</option>
                                        <option>Swasta</option>
                                        <option>Perusahaan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Direktur Lembaga</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No Direktur Lembaga</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Penanggung Jawab Lembaga</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <select class="form-control">
                                                <option>Kec 1</option>
                                                <option>Kec 2</option>
                                                <option>Kec 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kelurahan</label>
                                            <select class="form-control">
                                                <option>Kel 1</option>
                                                <option>Kel 2</option>
                                                <option>Kel 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pemilik</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Email</label>
                                    <input type="email" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Pendirian</label>
                                            <input type="date" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Izin Lembaga</label>
                                            <input type="date" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>No. Telepon</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>No. Sertifikasi</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Upload Bukti Izin .pdf</label>
                                            <input type="file" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Upload MoU .pdf</label>
                                            <input type="file" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Upload Gambar Lembaga</label>
                                            <input type="file" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-check">
                                            <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
                                            <label class="form-check-label" for="disabledFieldsetCheck">
                                                Status Terakreditasi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="detail2" role="tabpanel" aria-labelledby="detail-tab">
                                <div class="accordion" id="accordionsimplefill">
                                    <div class="mb-2 acd-group">
                                        <div class="card-header bg-primary rounded-0">
                                            <h5 class="mb-0">
                                                <a href="#collapse21" class="btn-block text-white text-left acd-heading" data-toggle="collapse">Lembaga</a>
                                            </h5>
                                        </div>
                                        <div id="collapse21" class="collapse show" data-parent="#accordionsimplefill">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Ruang Lingkup Lembaga</label>
                                                    <input type="text" name="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Uji Kompetensi Lembaga</label>
                                                    <input type="text" name="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 acd-group">
                                        <div class="card-header rounded-0 bg-primary">
                                            <h5 class="mb-0">
                                                <a href="#collapse22" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Tenaga Kerja Tetap</a>
                                            </h5>
                                        </div>
                                        <div id="collapse22" class="collapse" data-parent="#accordionsimplefill">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Perempuan</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 acd-group border-bottom-0">
                                        <div class="card-header rounded-0 bg-primary">
                                            <h5 class="mb-0">
                                                <a href="#collapse23" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Tenaga Kerja Tidak Tetap</a>
                                            </h5>
                                        </div>
                                        <div id="collapse23" class="collapse" data-parent="#accordionsimplefill">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Perempuan</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 acd-group border-bottom-0">
                                        <div class="card-header rounded-0 bg-primary">
                                            <h5 class="mb-0">
                                                <a href="#collapse24" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Instruktur Tetap</a>
                                            </h5>
                                        </div>
                                        <div id="collapse24" class="collapse" data-parent="#accordionsimplefill">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Perempuan</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 acd-group border-bottom-0">
                                        <div class="card-header rounded-0 bg-primary">
                                            <h5 class="mb-0">
                                                <a href="#collapse25" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Instruktur Tidak Tetap</a>
                                            </h5>
                                        </div>
                                        <div id="collapse25" class="collapse" data-parent="#accordionsimplefill">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Perempuan</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 acd-group border-bottom-0">
                                        <div class="card-header rounded-0 bg-primary">
                                            <h5 class="mb-0">
                                                <a href="#collapse26" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Asesor Kompetensi</a>
                                            </h5>
                                        </div>
                                        <div id="collapse26" class="collapse" data-parent="#accordionsimplefill">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Perempuan</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 acd-group border-bottom-0">
                                        <div class="card-header rounded-0 bg-primary">
                                            <h5 class="mb-0">
                                                <a href="#collapse27" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">Asesor Instruksi Asing</a>
                                            </h5>
                                        </div>
                                        <div id="collapse27" class="collapse" data-parent="#accordionsimplefill">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Perempuan</label>
                                                            <input type="number" name="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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