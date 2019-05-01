<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if ($this->session->userdata('level') == 'kejaksaan') 
          {
          ?>
            <img src="<?php echo base_url('asset/img/kejaksaan.png');?>" class="img-circle" alt="User Image');?>">
          <?php
          }
          else if ($this->session->userdata('level') =='kepolisian') 
          {
          ?>
            <img src="<?php echo base_url('asset/img/polisi.png');?>" class="img-circle" alt="User Image');?>">
          <?php
          }
          else if ($this->session->userdata('level') =='pengadilan') 
          {
          ?> 
            <img src="<?php echo base_url('asset/img/pengadilan.gif');?>" class="img-circle" alt="User Image');?>">
          <?php
          }
          else if ($this->session->userdata('level') =='lapas') 
          {
          ?>
            <img src="<?php echo base_url('asset/img/lapas.png');?>" class="img-circle" alt="User Image');?>">
          <?php
          }
          else if ($this->session->userdata('level') =='superadmin') 
          {
          ?> <b> Superadmin </b>;
          <?php
          }
          ?>
        </div>
        <div class="pull-left info">
          <p>Profile</p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>    

     <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <!-- session polisi -->
          <?php if ($this->session->userdata('level') == 'kepolisian') {?>
            <a href="<?php echo base_url('kepolisian');?>">
              <i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span> Surat Balasan </span>
            </a>

            <a href="<?php echo base_url('bon');?>">
              <i class="fa fa-inbox" aria-hidden="true"></i> <span> Bon Balasan </span>
            </a>

            <a href="<?php echo base_url('kepolisian/form');?>">
              <i class="fa fa-edit"></i> <span> Entry Surat </span>
            </a>

            <a href="<?php echo base_url('bon/form_bon');?>">
              <i class="fa fa-plus-square" aria-hidden="true"></i> <span> Entry Bon </span>
            </a>

            <a href="<?php echo base_url('kepolisian/riwayat_surat');?>">
              <i class="fa fa-history" aria-hidden="true"></i> <span> Riwayat Surat </span>
            </a>

            <a href="<?php echo base_url('profile');?>">
              <i class="fa fa-user"></i> <span> Profile </span>
            </a>
          <!-- akhir session polisi -->

          <!-- session kejaksaan -->
          <?php } else if ($this->session->userdata('level') == 'kejaksaan') { ?>  
          
            <a href="<?php echo base_url('kejaksaan');?>">
              <i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span> Surat Polisi </span>
            </a> 

            <a href="<?php echo base_url('bon');?>">
              <i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span> Bon Balasan </span>
            </a>

            <a href="<?php echo base_url('kejaksaan/riwayat_balas');?>">
              <i class="fa fa-history" aria-hidden="true"></i> <span> Riwayat Balas </span>
            </a> 

            <a href="<?php echo base_url('kejaksaan/riwayat_surat');?>">
              <i class="fa fa-envelope-o"></i> <span> Riwayat Surat </span>
            </a>

            <a href="<?php echo base_url('kejaksaan/form_entry');?>">
              <i class="fa fa-edit"></i> <span> Entry Surat </span>
            </a>

            <a href="<?php echo base_url('bon/form_bon');?>">
              <i class="fa fa-plus-square" aria-hidden="true"></i> <span> Entry Bon </span>
            </a>

            <a href="<?php echo base_url('profile');?>">
              <i class="fa fa-user"></i> <span> Profile </span>
            </a>
          <!-- akhir session kejaksaan -->

          <!-- session pengadilan -->
          <?php } else if ($this->session->userdata('level') == 'pengadilan') { ?>
            <a href="<?php echo base_url('pengadilan');?>">
              <i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span> Surat Polisi </span>
            </a>

            <a href="<?php echo base_url('bon');?>">
              <i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span> Bon Balasan <span>
            </a>

            <a href="<?php echo base_url('pengadilan/riwayat_balas');?>">
              <i class="fa fa-history" aria-hidden="true"></i> <span> Riwayat Balas </span>
            </a> 

            <a href="<?php echo base_url('pengadilan/data_surat');?>">
              <i class="fa fa-envelope-o"></i> <span> Riwayat Surat </span>
            </a>   

            <a href="<?php echo base_url('pengadilan/form');?>">
              <i class="fa fa-edit"></i> <span> Entry Surat </span>
            </a>

            <a href="<?php echo base_url('bon/form_bon');?>">
              <i class="fa fa-plus-square" aria-hidden="true"></i> <span> Entry Bon </span>
            </a>
            
            <a href="<?php echo base_url('profile');?>">
              <i class="fa fa-user"></i> <span> Profile </span>
            </a>
          <!-- akhir session pengadilan -->

          <!-- session lapas -->
          <?php } else if ($this->session->userdata('level') == 'lapas') { ?>
            <a href="<?php echo base_url('lapas');?>">
              <i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span> Bon Masuk </span>
            </a>

            <a href="<?php echo base_url('lapas/data_surat');?>">
              <i class="fa fa-envelope-o"></i> <span> Riwayat Surat </span>
            </a>

            <a href="<?php echo base_url('lapas/form');?>">
              <i class="fa fa-edit"></i> <span> Entry Surat </span>
            </a>

            <a href="<?php echo base_url('profile');?>">
              <i class="fa fa-user"></i> <span> Profile </span>
            </a>   
          <!-- akhir session lapas -->

          <!-- session superadmin -->
          <?php } else if ($this->session->userdata('level') == 'superadmin') {?>
            <a href="<?php echo base_url('superadmin');?>">
              <i class="fa fa-envelope-open-o" aria-hidden="true"></i> Data Users
            </a>   
            <a href="<?php echo base_url('profile');?>">
              <i class="fa fa-user"></i> Profile
            </a>
          <?php } ?>
          <!-- akhir session superadmin -->
        </li>
        <li>
          <a href="<?php echo base_url('auth/sign_out');?>" onclick="return confirm('Mau Logout?')">
            <i class="fa fa-sign-out"></i> <span> Logout </span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>