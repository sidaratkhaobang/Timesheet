<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto" method="POST" action="<?php echo base_url() ?>login_ctrl/login">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('firstname'); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title"><?php echo $this->session->userdata('firstname'); ?></div>
              <?php if ($this->session->userdata('level') == "A") { ?>
                <a href="<?php echo base_url('Profile_ctrl/admin_profile/'); ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a> 
              <?php } elseif ($this->session->userdata('level') == "") {?>
                <a href="<?php echo base_url('Profile_ctrl/emp_profile/'); ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a> 
              <?php 
              } elseif ($this->session->userdata('level') == "L") {?>
                <a href="<?php echo base_url('Profile_ctrl/leader_profile/'); ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a> 
              <?php 
                
              }
              ?>
              
              <!-- <a href="<?php echo base_url(); ?>dist/features_settings" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i>Change about yourself
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url() ?>dist/auth_login" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>