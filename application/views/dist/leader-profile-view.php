<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
        <!--================Home Banner Area =================-->
        <section class="profile_area">
           	<div class="container">
           		<div class="profile_inner p_120">
					<div class="row">
						<div class="col-lg-4">
							<img class="img-thumbnail"src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" alt="">
						</div>
						<div class="col-lg-7">
							<div class="personal_text">
								<h6>Hi,</h6>
								<h2><?php echo $this->session->userdata('firstname');?>&nbsp;<?php echo $this->session->userdata('lastname');?></h2>
								<h5><?php echo $this->session->userdata('role');?></h5>
								<p>You will begin to realise why this exercise is called the Dickens Pattern (with reference to the ghost showing Scrooge some different futures)</p><br>
								<ul class="list basic_info">
									<i class="fa fa-phone" style="font-size:24px"></i>&nbsp;<?php echo $this->session->userdata('phone');?></a></li><br>
									<i class="fas fa-envelope" style="font-size:24px"></i>&nbsp;<?php echo $this->session->userdata('email');?></a></li>
								</ul>
                <br><br>
                <!-- <a href="<?php echo base_url('profile_ctrl/edit_profile')?>" class="card-link"><?php echo $this->session->userdata('idUser');?>Change about yourself</a>               -->
						</div>
					</div>
           		</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
<?php $this->load->view('dist/_partials/footer'); ?>