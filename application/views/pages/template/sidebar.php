<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('asset/img/users.jpg');?>" class="img-circle" alt="User Image');?>">
        </div>
        <div class="pull-left info">
           <p>Profile</p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>    

     <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <?php if ($this->session->userdata('level') == 'kejaksaan') 
          {
          ?>  
          <a href="<?php echo base_url('kejaksaan');?>">
            <i class="fa fa-dashboard"></i> <span>Daftar Jadwal</span>
            <span class="pull-right-container">
            </span>
          </a> 
          <?php
          }
          else if ($this->session->userdata('level') == 'kepolisian') 
          {
          ?>
          <a href="<?php echo base_url('kepolisian');?>">
            <i class="fa fa-dashboard"></i> <span>Daftar Jadwal</span>
            <span class="pull-right-container">
            </span>
          </a>   
          <?php
          }
          else if ($this->session->userdata('level') == 'pengadilan') 
          {
          ?>
          <a href="<?php echo base_url('pengadilan');?>">
            <i class="fa fa-dashboard"></i> <span>Daftar Jadwal</span>
            <span class="pull-right-container">
            </span>
          </a>   
          <?php
          }
          else if ($this->session->userdata('level') == 'lapas') 
          {
          ?>
          <a href="<?php echo base_url('lapas');?>">
            <i class="fa fa-dashboard"></i> <span>Daftar Jadwal</span>
            <span class="pull-right-container">
            </span>
          </a>   
          <?php
          }
          else if ($this->session->userdata('level') == 'superadmin') 
          {
          ?>
          <a href="<?php echo base_url('superadmin');?>">
            <i class="fa fa-dashboard"></i> <span>Data Users</span>
            <span class="pull-right-container">
            </span>
          </a>   
          <?php
          }
          ?>
        </li>
     
        <li>
          <?php if ($this->session->userdata('level') == 'kejaksaan') 
          {
          ?>  
            <a href="<?php echo base_url('kejaksaan/tambah_jadwal');?>">
              <i class="fa fa-edit"></i> <span>Tambah Jadwal</span>
            </a>
          <?php
          }
          else if ($this->session->userdata('level') == 'kepolisian') 
          {
          ?>
            <a href="<?php echo base_url('kepolisian/tambah_jadwal');?>">
              <i class="fa fa-edit"></i> <span>Tambah Jadwal</span>
            </a>
          <?php
          }
          else if ($this->session->userdata('level') == 'pengadilan') 
          {
          ?>
            <a href="<?php echo base_url('pengadilan/tambah_jadwal');?>">
              <i class="fa fa-edit"></i> <span>Tambah Jadwal</span>
            </a>
          <?php
          }
          else if ($this->session->userdata('level') == 'lapas') 
          {
          ?>
            <a href="<?php echo base_url('lapas/tambah_jadwal');?>">
              <i class="fa fa-edit"></i> <span>Tambah Jadwal</span>
            </a>
          <?php
          }
          ?>
        </li>

        <li>
        <?php if ($this->session->userdata('level') == 'kejaksaan') 
        {
        ?>  
          <a href="<?php echo base_url('kejaksaan/data_jadwal');?>">
            <i class="fa fa-table"></i> <span>Data Jadwal</span>
          </a>
        <?php
        }
        else if ($this->session->userdata('level') == 'kepolisian') 
        {
        ?>
          <a href="<?php echo base_url('kepolisian/data_jadwal');?>">
            <i class="fa fa-table"></i> <span>Data Jadwal</span>
          </a>
        <?php 
        } 
        else if ($this->session->userdata('level') == 'pengadilan') 
        {
        ?>
          <a href="<?php echo base_url('pengadilan/data_jadwal');?>">
            <i class="fa fa-table"></i> <span>Data Jadwal</span>
          </a>
        <?php 
        } 
        else if ($this->session->userdata('level') == 'lapas') 
        {
        ?>
          <a href="<?php echo base_url('lapas/data_jadwal');?>">
            <i class="fa fa-table"></i> <span>Data Jadwal</span>
          </a>
        <?php 
        } 
        ?>
        </li>

        <li>
        <?php if ($this->session->userdata('level') == 'kepolisian') 
        {
        ?>  
          <a href="<?php echo base_url('profile');?>">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        <?php
        }
        else if ($this->session->userdata('level') == 'kejaksaan') 
        {
        ?>
          <a href="<?php echo base_url('profile');?>">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        <?php 
        } 
        else if ($this->session->userdata('level') == 'pengadilan') 
        {
        ?>
          <a href="<?php echo base_url('Profile');?>">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        <?php 
        } 
        else if ($this->session->userdata('level') == 'lapas') 
        {
        ?>
          <a href="<?php echo base_url('profile');?>">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        <?php 
        }  
        else if ($this->session->userdata('level') == 'superadmin') 
        {
        ?>
          <a href="<?php echo base_url('profile');?>">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        <?php 
        } 
        ?>
        </li>
        
        <li>
          <a href="<?php echo base_url('auth/sign_out');?>" onclick="return confirm('Mau Logout?')">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>