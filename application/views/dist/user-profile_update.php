<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_M');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Edit Profile</div>
      </div>
    </div>
    <!--================Home Banner Area =================-->
    <div class="col-12 col-md-12 col-lg-7">
      <div class="card">
        <form action="<?php echo base_url('Profile_ctrl/update_data/'); ?>" method="post"  class="needs-validation" novalidate="">
          <div class="card-header">
            <h4>Edit Profile</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>First Name</label>
                <input type="text" class="form-control" value="<?php echo $this->session->userdata('firstname'); ?>" required="">
                <div class="invalid-feedback">
                  Please fill in the first name
                </div>
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Last Name</label>
                <input type="text" class="form-control" value="<?php echo $this->session->userdata('lastname'); ?>" required="">
                <div class="invalid-feedback">
                  Please fill in the last name
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-7 col-12">
                <label>Email</label>
                <input type="email" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" required="">
                <div class="invalid-feedback">
                  Please fill in the email
                </div>
              </div>
              <div class="form-group col-md-5 col-12">
                <label>Phone</label>
                <input type="tel" class="form-control" value="<?php echo $this->session->userdata('phone'); ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
              <label>Profile Picture</label>
            <div class="custom-file">
        
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label>Bio</label>
                <textarea class="form-control summernote-simple"></textarea>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="submit" name="action" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
      <?php $this->load->view('dist/_partials/footer'); ?>