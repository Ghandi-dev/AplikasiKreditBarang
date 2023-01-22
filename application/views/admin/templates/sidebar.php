  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url('assets/dist')?>/img/logo123.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><h4>SIKERANG</h4></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist')?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $this->session->userdata('nama') ?> </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/index';?>" class="nav-link 
            <?php if($this->uri->segment(2) == 'index'|| $this->uri->segment(4) == 'index' || $this->uri->segment(2) == 'detail_plg') 
            { echo 'active'; } ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>Pelanggan</p> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/penjualan';?>" class="nav-link 
            <?php if($this->uri->segment(2) == 'penjualan' || $this->uri->segment(4) == 'penjualan') 
            { echo 'active'; } ?>">
              <i class="nav-icon fa fa-cart-plus"></i>
              <p>Penjualan</p> 
            </a>
          </li>            
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/pembayaran';?>" class="nav-link 
            <?php if($this->uri->segment(2) == 'pembayaran' || ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'detail' ) || $this->uri->segment(4) == 'detail') 
            { echo 'active'; } ?>">
              <i class="nav-icon fa fa-money-bill"></i>
              <p>Pembayaran</p> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'Login/Admin';?>" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>Logout</p> 
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>