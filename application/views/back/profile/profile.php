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
            <?=  $this->session->flashdata('message'); ?>
            <?= validation_errors(); ?>
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profil User</h3>
                        
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('user/edit_profile/'.$this->session->id_user) ?>" method="post">
                            <label for="">Username : </label>
                            <div class="input-group mb-3">
                                <input readonly type="text" name="username" class="form-control" placeholder="Nama Lengkap" value="<?=$user->username?>">
                            </div>

                            <label for="">Email : </label>
                            <div class="input-group mb-3">
                                <input readonly type="text" name="email" class="form-control" placeholder="Email" value="<?=$user->email?>">
                            </div>

                            <label for="">Lever User: </label>
                            <div class="input-group mb-3">
                                <input readonly type="text" name="level" class="form-control" placeholder="Level User" value="<?php if ($user->level_user == 0) {
                                                    echo "Admin";
                                                } elseif ($user->level_user == 1) {
                                                    echo "Staff";
                                                } else {
                                                    echo "User level belum di tentukan (kode level: " . $user->level_user . ")";
                                                }

                                                ?>">
                            </div>
                
                            <button type="submit" class="btn btn-primary btn-sm">Edit Profil</button>
                            <a href="<?= base_url('user/ganti_password/' . $user->id_user) ?>" class="btn btn-warning btn-sm">Ganti Password</a>
                            
        
                        </form>
                    </div>
                </div>
            </div>
           
        </div>

    </section>
</div>