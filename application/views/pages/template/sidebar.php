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
          ?> <b> Superadmin </b>
          <?php
          }
          ?>
        </div>
        <div class="pull-left info">
          <p>
            <?php if($this->session->userdata('level') =='kejaksaan')
            {
            ?>
            <b> Kejaksaan </b>
            <?php
            }
            else if ($this->session->userdata('level') =='kepolisian') 
            {
            ?>
            <b> Polisi </b>
            <?php
            }
            else if ($this->session->userdata('level') =='pengadilan') 
            {
            ?> 
            <b> Pengadilan </b>
            <?php
            }
            else if ($this->session->userdata('level') =='lapas') 
            {
            ?>
            <b> Lapas </b>
            <?php
            }
            else if ($this->session->userdata('level') =='superadmin') 
            {
            ?> <b> Superadmin </b>
            <?php
            }
            ?>
          </p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>    

     <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- session polisi -->
        <?php if ($this->session->userdata('level') != 'superadmin') {?>
          <li <?= $this->uri->segment(1) =='dashboard' ? 'class="active"' : null;?>>
            <a href="<?php echo base_url('dashboard');?>">
              <i class="fa fa-dashboard"></i> <span> Dashboard </span>
            </a>
          </li>
        <?php } ?>

        <?php if ($this->session->userdata('level') == 'kepolisian') {?>
        
        <li class="treeview <?= $this->uri->segment(1) =='kepolisian' ? 'active' : null;?>">
          <a href="#">
            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span> Surat</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('kepolisian');?>"><i class="fa fa-envelope-open-o"></i> <span> Surat Balasan </span></a>
            </li>
            <li>
              <a href="<?php echo base_url('kepolisian/form');?>"><i class="fa fa-edit"></i> <span> Entry Surat </span></a>
            </li>
            <li>
              <a href="<?php echo base_url('kepolisian/riwayat_surat');?>">
                <i class="fa fa-file-text-o" aria-hidden="true"></i></i> <span> Riwayat Surat </span>
              </a>
            </li>
          </ul>
        </li>
 
        <!-- akhir session polisi -->

        <!-- session kejaksaan -->

        <?php } else if ($this->session->userdata('level') == 'kejaksaan') { ?>  
        
        <li class="treeview <?= $this->uri->segment(1) =='kejaksaan' ? 'active' : null;?>">
          <a href="#">
            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span> Surat</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('kejaksaan');?>"><i class="fa fa-envelope-open-o"></i> <span> Surat Polisi </span></a>
            </li>
            <li>
              <a href="<?php echo base_url('kejaksaan/form_entry');?>"><i class="fa fa-edit"></i> <span>Entry Surat</span></a>
            </li>
            <li>
              <a href="<?php echo base_url('kejaksaan/riwayat_balas');?>">
                <i class="fa fa-file-text-o" aria-hidden="true"></i></i> <span> Riwayat Balas Surat Polisi </span>
              </a>
            </li>
          </ul>
        </li>

        <!-- akhir session kejaksaan -->

        <!-- session pengadilan -->

        <?php } else if ($this->session->userdata('level') == 'pengadilan') { ?>


         <li class="treeview <?= $this->uri->segment(1) =='pengadilan' ? 'active' : null;?>">
          <a href="#">
            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span> Surat</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('pengadilan');?>"><i class="fa fa-envelope-open-o"></i> <span> Surat Polisi </span></a>
            </li>
            <li>
              <a href="<?php echo base_url('pengadilan/riwayat_balas');?>">
                <i class="fa fa-file-text-o" aria-hidden="true"></i></i> <span> Riwayat Balas Surat Polisi </span>
              </a>
            </li>
          </ul>
        </li>

        <!-- akhir session pengadilan -->
        
        <!-- session lapas -->

        <?php } else if ($this->session->userdata('level') == 'lapas') { ?>
        

         <li class="treeview <?= $this->uri->segment(1) =='lapas' ? 'active' : null;?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Bon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('lapas');?>">
                <i class="fa fa-inbox" aria-hidden="true"></i> <span> Bon Masuk </span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('lapas/riwayat_balas_bon');?>">
                <i class="fa fa-clipboard" aria-hidden="true"></i> <span> Riwayat Balas Bon </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) =='lapas_apl' ? 'active' : null;?>">
          <a href="#">
            <i class="fa fa-pencil"></i> <span>Apl</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('lapas_apl');?>">
                <i class="fa fa-inbox" aria-hidden="true"></i> <span> Apl Masuk </span>
              </a>            
            </li>

            <li>
              <a href="<?php echo base_url('lapas_apl/riwayat_balas');?>">
                <i class="fa fa-clipboard" aria-hidden="true"></i> <span> Riwayat Balas Apl </span>
              </a>
            </li>
          </ul>
        </li>

        <!-- akhir session lapas -->
        
        <!-- session superadmin -->

        <?php } else if ($this->session->userdata('level') == 'superadmin') {?>
        <li>
            <a href="<?php echo base_url('superadmin');?>">
              <i class="fa fa-envelope-open-o" aria-hidden="true"></i> Data Users
            </a>   
        </li>

        <li>
            <a href="<?php echo base_url('profile');?>">
              <i class="fa fa-user"></i> Profile
            </a>
        </li>
        <?php } ?>

        <!-- menu bon tidak tampil di lapas -->
        <?php if ($this->session->userdata('level') != 'lapas' && $this->session->userdata('level') != 'superadmin') {?>        
        <li class="treeview <?= $this->uri->segment(1) =='bon' ? 'active' : null;?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Bon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('bon');?>">
                <i class="fa fa-inbox" aria-hidden="true"></i> <span> Bon Balasan </span>
              </a>            
            </li>

            <li>
              <a href="<?php echo base_url('bon/form_bon');?>">
                <i class="fa fa-pencil" aria-hidden="true"></i> <span> Entry Bon </span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url('bon/riwayat_bon');?>">
                <i class="fa fa-clipboard" aria-hidden="true"></i> <span> Riwayat Bon </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) =='apl' ? 'active' : null;?>">
          <a href="#">
            <i class="fa fa-pencil"></i> <span>Apl</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('apl');?>">
                <i class="fa fa-inbox" aria-hidden="true"></i> <span> Apl Balasan </span>
              </a>            
            </li>

            <li>
              <a href="<?php echo base_url('apl/form_apl');?>">
                <i class="fa fa-pencil" aria-hidden="true"></i> <span> Entry Apl </span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url('apl/riwayat_apl');?>">
                <i class="fa fa-clipboard" aria-hidden="true"></i> <span> Riwayat Apl </span>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <li <?= $this->uri->segment(1) =='profile' ? 'class="active"' : null;?>>
           <a href="<?php echo base_url('profile');?>">
              <i class="fa fa-user"></i> <span> Profile </span>
            </a>
        </li>
          <!-- akhir session superadmin -->
        <li>
          <a href="<?php echo base_url('auth/sign_out');?>" onclick="return confirm('Mau Logout?')">
            <i class="fa fa-sign-out"></i> <span> Logout </span>
          </a>
        </li>

      </ul>
    </section>
  </aside>