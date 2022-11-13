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
                        <form action="<?= base_url('user/update_password/'.$this->session->id_user) ?>" method="post">
                            <input type="hidden" name="id_user" class="form-control" placeholder="ID" value="<?=$user->id_user?>">
                            <input type="hidden" name="username" class="form-control" placeholder="username" value="<?=$user->username?>">

                            <label for="">Password lama : </label>
                            <div class="input-group mb-3">
                                <input type="password" name="password_lama" class="form-control" placeholder="Password lama">
                            </div>

                            <label for="">Password baru : </label>
                            <div class="input-group mb-3">
                                <input type="password" name="password_baru" class="form-control" placeholder="Password baru" >
                            </div>

                            <label for="">Ulangi Password baru : </label>
                            <div class="input-group mb-3">
                                <input type="password" name="ulangi_password" class="form-control" placeholder="Ulangi Password baru" >
                            </div>
                
                            <button type="submit" class="btn btn-primary btn-sm">Ganti Password</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            
        
                        </form>
                    </div>
                </div>
            </div>
           
        </div>

    </section>
</div>