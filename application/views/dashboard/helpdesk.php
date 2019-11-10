<div class="row crypto-currency">
    <div class="col-lg-12">
        <div class="card card-statistics crypto-currency">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data Pengaduan</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="table table-borderless crypto-table w-100">
                        <thead class="bg-light">
                            <tr>
                                <th width="2%">No.</th>
                                <th width="30%">Email</th>
                                <th>Pesan</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($helpdesk as $row) { ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $row->email; ?></td>
                                    <td><?= $row->pesan; ?></td>
                                    <!-- <td><button class="btn btn-success btn-sm">Balas</button></td> -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>