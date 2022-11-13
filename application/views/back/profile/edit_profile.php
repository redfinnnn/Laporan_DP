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
                        <h3 class="card-title">Edit Profile</h3>
                        <a href="<?= base_url('user/profile/'.$this->session->id_user) ?>" class= "btn btn-primary btn-sm float-right">kembali</a>
                        
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('user/update_profile/'.$this->session->id_user) ?>" method="post">

                            <input type="hidden" name="id_user" class="form-control" placeholder="ID" value="<?=$user->id_user?>">
                            <input type="hidden" name="ori_email" class="form-control" placeholder="ori_Email" value="<?=$user->email?>">
                            <input type="hidden" name="ori_username" class="form-control" placeholder="ori_username" value="<?=$user->username?>">

                            <label for="">Username : </label>
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Nama Lengkap" value="<?=$user->username?>">
                            </div>

                            <label for="">Email : </label>
                            <div class="input-group mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?=$user->email?>">
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

                            <label for="">Password : </label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" value="">
                            </div>
                
                            <button type="submit" class="btn btn-primary btn-sm">Update Profil</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            
        
                        </form>
                    </div>
                </div>
            </div>
           
        </div>

    </section>
</div>