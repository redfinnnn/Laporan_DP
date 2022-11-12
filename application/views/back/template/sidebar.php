<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <div class="brand-link">
    <!-- <img src="<?= base_url() ?>assets/back/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
    <span class="brand-text font-weight-light">
      <h3 class="text-center">Dashboard Data</h3>
    </span>
</div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/back/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('dashboard') ?>" class="d-block"><?= $this->session->username ?></a>
        </div>
      </div> -->

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

       
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('dashboard') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
       

        <li class="nav-header">DATA MASTER</li>
        <!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
        
          <li class="nav-item has-treeview">
            <a href="<?= base_url('user') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data User
              </p>
            </a>
          
          
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('tiket') ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Pembayaran
              </p>
            </a>
          </li>

          <li class="nav-header">LAPORAN</li>
        
          <li class="nav-item has-treeview">
            <a href="<?= base_url('user') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Diagram pembayaran
              </p>
            </a>
       
        

          <li class="nav-header">PROFIL</li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('karyawan/profile/' . $this->session->id_user); ?>" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Profil user
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>