<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
    </section>
    <section class="content">
        <div class="row mt-2">
            <div class="col-12">
                <?= $this->session->flashdata('message'); ?>
                <?= validation_errors(); ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pembayaran</h3>
                            <!-- <a href="<?= base_url('user/add_user') ?>" class="btn btn-primary btn-sm float-right">Tambah Data</a> -->
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('hapus'); ?>
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No kwitansi</th>
                                        <th>Tanggal</th>
                                        <th>Tanggal alokasi</th>
                                        <th>Customer</th>
                                        <th>Metode pembayaran</th>
                                        <th>Total</th>
                                        <th>Biaya admin</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 1;

                                    foreach ($pembayaran as $row) { ?>
                                        <tr>
                                            <td><?= $row->no_kwitansi ?></td>
                                            <td><?= $row->tanggal ?></td>
                                            <td><?= $row->tanggal_alokasi ?></td>
                                            <td><?= $row->customer ?></td>
                                            <td><?= $row->metode_bayar ?></td>
                                            <td><?= $row->total ?></td>
                                            <td><?= $row->total_admin ?></td>
                                            <!-- <td> 
                                                
                                            </td> -->
                                            <?php } ?>


                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    </section>
</div>