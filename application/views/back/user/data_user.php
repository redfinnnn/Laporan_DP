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
                            <h3 class="card-title">Data User</h3>
                            <a href="<?= base_url('user/add_user') ?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('hapus'); ?>
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>User Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 1;

                                    foreach ($user as $row) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->username ?></td>
                                            <td><?= $row->email ?></td>
                                            <td><?php if ($row->level_user == 0) {
                                                    echo "Admin";
                                                } elseif ($row->level_user == 1) {
                                                    echo "Staff";
                                                } else {
                                                    echo "User level belum di tentukan (kode level: " . $row->level_user . ")";
                                                }

                                                ?></td>
                                            <td> <?php if($this->session->id_user!=$row->id_user){?><a href="<?= base_url('user/edit_user/' . $row->id_user) ?>" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                |
                                                <a onclick="return confirm('apakah anda yakin akan menghapus User <?= $row->username; ?>?');" href="<?= base_url('user/delete_user/' . $row->id_user) ?>" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i><?php } ?>
                                                </a>
                                            </td>
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