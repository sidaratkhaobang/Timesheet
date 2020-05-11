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
        <div class="breadcrumb-item active"><a href="<?php echo base_url('Profile_ctrl/leader_profile'); ?>">Profile</a></div>
        <div class="breadcrumb-item">Edit Profile</div>
      </div>
    </div>
    <div class="col-12 col-md-12 col-lg-7">
      <div class="card">
        <form method="Post" action="<?php echo base_url('profile_ctrl/update_data_leader/' . $data->idUser); ?>" class="needs-validation" novalidate="">
          <div class="card-header">
            <h4>Edit Profile</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $data->firstname; ?>" required="">
                <div class="invalid-feedback">
                  Please fill in the first name
                </div>
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $data->lastname; ?>" required="">
                <div class="invalid-feedback">
                  Please fill in the last name
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-7 col-12">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data->email; ?>" required="">
                <div class="invalid-feedback">
                  Please fill in the email
                </div>
              </div>
              <div class="form-group col-md-5 col-12">
                <label>Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $data->phone; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label>Bio</label>
                <textarea class="form-control summernote-simple" id="bio" name="bio">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
              </div>
            </div>
            <!-- <div class="row">
              <div class="form-group col-6">
                <label>Your picture</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="img" name="img">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div> -->
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary" type="submit" name="action">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>