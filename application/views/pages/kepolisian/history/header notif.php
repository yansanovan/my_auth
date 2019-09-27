				<!-- <?php //if ($this->session->userdata("level") == "kepolisian") {?>
				<li class="dropdown notifications-menu">
					<a href="#" class="polisi" data-toggle="dropdown">
						<i class="fa fa-envelope-o"></i><span class="label label-danger count"></span> 
					</a>
					<ul class="dropdown-menu" id="notifikasi"></ul>
				</li>
				<?php } ?> -->
				
				 <?php  if ($this->session->userdata("level") == "kejaksaan"){ ?> 

				<li class="dropdown notifications-menu">
					<a href="#" class="notify" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i><span class="label label-danger"></span> 
					</a>
					<ul class="dropdown-menu" id="notify"></ul>
				</li>
				<?php } ?>
				<!--  <li class="dropdown notifications-menu">
					<a href="#" class="kepolisian_kj" data-toggle="dropdown">
						<i class="fa fa-envelope-o"></i><span class="label label-danger count"></span> 
					</a>
					<ul class="dropdown-menu" id="kepolisian_kj"></ul>
				</li>

				<li class="dropdown notifications-menu">
					<a href="#" class="surat_balasan_pengadilan" data-toggle="dropdown">
						<i class="fa fa-bullhorn"></i><span class="label label-danger count_surat_balasan_pengadilan"></span> 
					</a>
					<ul class="dropdown-menu" id="surat_balasan_pengadilan"></ul>
				</li> -->

				<!-- <?php //if ($this->session->userdata("level") == "pengadilan") { ?>
					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i><span class="label label-danger count"></span> 
						</a>
						<ul class="dropdown-menu" id="kepolisian_pn"></ul>
					</li>

					<li class="dropdown notifications-menu">
						<a href="#" class="surat_masuk_kejaksaan" data-toggle="dropdown">
							<i class="fa fa-bullhorn"></i><span class="label label-danger count_surat_masuk_kejaksaan"></span> 
						</a>
						<ul class="dropdown-menu" id="surat_masuk_kejaksaan"></ul>
					</li>
				<?php } ?>

				<?php  //if ($this->session->userdata("level") == "lapas"){ ?>
				 <li class="dropdown notifications-menu">
					<a href="#" class="bon_masuk" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i><span class="label label-danger count_bon_masuk"></span> 
					</a>
					<ul class="dropdown-menu" id="bon_masuk"></ul>
				</li>
				<li class="dropdown notifications-menu">
					<a href="#" class="apl_masuk " data-toggle="dropdown">
						<i class="fa fa-flag-o"></i><span class="label label-danger count_apl"></span> 
					</a>
					<ul class="dropdown-menu" id="apl_masuk"></ul>
				</li>
				<?php } ?> -->

				<!-- <?php // if ($this->session->userdata("level") == "kepolisian" OR $this->session->userdata("level") == "kejaksaan"  OR $this->session->userdata("level") == "pengadilan"){ ?> -->
				 <!-- 	<li class="dropdown notifications-menu">
						<a href="#" class="bon_balasan" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i><span class="label label-danger count_bon_balasan"></span> 
						</a>
						<ul class="dropdown-menu" id="bon_balasan"></ul>
					</li>

				 	<li class="dropdown notifications-menu">
						<a href="#" class="apl_balasan" data-toggle="dropdown">
							<i class="fa fa-flag-o"></i><span class="label label-danger count_apl_balasan"></span> 
						</a>
						<ul class="dropdown-menu" id="apl_balasan"></ul>
					</li> -->
				<!-- <?php// } ?> -->