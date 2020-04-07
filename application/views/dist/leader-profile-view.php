<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
		<div class="section-body">
			<h2 class="section-title">Hi, <?php echo $this->session->userdata('firstname'); ?>&nbsp;<?php echo $this->session->userdata('lastname'); ?></h2>

			<p class="section-lead">
				<a href="<?php echo base_url('Profile_ctrl/update_profile/'); ?>" class="card-cta">Change information about yourself on this here. <i class="fas fa-chevron-right"></i></a>
			</p>

			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-">
					<div class="card profile-widget">
						<div class="profile-widget-header">
							<img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
							<div class="profile-widget-items">
								<div class="profile-widget-item">
									<div class="profile-widget-item-label"><i class="fa fa-phone"></i></div>
									<?php echo $this->session->userdata('phone'); ?>
								</div>
								<div class="profile-widget-item">
									<div class="profile-widget-item-label"><i class="fas fa-envelope"></i></div>
									<?php echo $this->session->userdata('email'); ?>
								</div>
							</div>
						</div>
						<div class="profile-widget-description">
							<div class="profile-widget-name"><?php echo $this->session->userdata('firstname'); ?>&nbsp;<?php echo $this->session->userdata('lastname'); ?><div class="text-muted d-inline font-weight-normal">
									<div class="slash"><?php echo $this->session->userdata('role'); ?></div>
								</div>
							</div>
							<!-- Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>. -->
						</div>

					</div>
				</div>

			</div>
		</div>
</div>

<!--================End Home Banner Area =================-->
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page/modules-ion-icons.js"></script>
<?php $this->load->view('dist/_partials/footer'); ?>