<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<body>

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/bird.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form class="needs-validation" novalidate="" method="POST" action="<?php echo base_url() ?>register_ctrl/validation">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="firstname">First Name</label>
                      <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
                      <div class="invalid-feedback">
                        What's your first name?
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="lastname">Last Name</label>
                      <input id="lastname" type="text" class="form-control" name="lastname" required autofocus>
                      <div class="invalid-feedback">
                        What's your last name?
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required autofocus>
                      <div class="invalid-feedback">
                        What's your email?
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="password" class="d-block">Password</label>

                      <input id="password" type="password" class="form-control pwstrength" pattern=".{8,}" data-indicator="pwindicator" name="password" required autofocus>

                      <div class="invalid-feedback">
                        Please enter more than 8 digits.
                      </div>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                      <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                    </div>
                    <!-- <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm" required autofocus>
                      <div class="invalid-feedback">
                      You must confirm your password.
                    </div>
                    </div> -->
                  </div>

                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              You want to login? <a href="<?php echo base_url(); ?>dist/auth_login">Login</a>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('dist/_partials/footer'); ?>
  <?php $this->load->view('dist/_partials/js'); ?>
  <script>
    $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>