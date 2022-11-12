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
                        <h3 class="card-title">Form Input User</h3>
                        <a href="<?= base_url('user') ?>" class= "btn btn-primary btn-sm float-right">kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('user/save_user') ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="email" value='<?= set_value('email') ?>' class="form-control" placeholder="Email">
                                
                            </div>
                        
                            <div class="input-group mb-3">
                                <select name="level" class="form-control">
                                    <option value="">---Pilih Level User---</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Staff</option>
                                </select>
                                
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password">
                                
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