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
                        <h3 class="card-title">Form Edit User <b><?=$user->username?></b></h3>
                        <a href="<?= base_url('user') ?>" class= "btn btn-primary btn-sm float-right">kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('user/update_user') ?>" method="post">
                        <input type="hidden" name="id_user" class="form-control" placeholder="ID" value="<?=$user->id_user?>">
                        <input type="hidden" name="ori_email" class="form-control" placeholder="ori_Email" value="<?=$user->email?>">
                        <input type="hidden" name="ori_username" class="form-control" placeholder="ori_username" value="<?=$user->username?>">
                            
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$user->username?>">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?=$user->email?>">                               
                            </div>
                            <div class="input-group mb-3">
                                <select name="level" class="form-control">
                                    <option value="0" <?= $user->level_user == '0' ? 'selected' : null ?>>Admin</option>
                                    <option value="1" <?= $user->level_user == '1' ? 'selected' : null ?>>Staff</option>
                                </select>
                            </div>
                           
                            
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
        
                        </form>
                    </div>
                </div>
            </div>
           
        </div>

    </section>
</div> 