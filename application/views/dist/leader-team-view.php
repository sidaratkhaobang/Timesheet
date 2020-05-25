<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?php echo base_url(); ?>Leader_ctrl/status" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail Team</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('Leader_ctrl/dashboard'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Detail Team</div>
            </div>
        </div>
        <section class="section">
            <div class="container mt-5">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-dark">
                        <div class="card-header">
                            <div class="card-body">
                                <!-- <div class="form-group">
                                    <label for="team_name">Project Name:</label>
                                    <input type="text" class="form-control" value="<?php echo $team->projectName ?>">
                                </div> -->
                                <div class="form-group">
                                    <label for="team_name">Team Name:</label>
                                    <input type="text" class="form-control" value="<?php echo $team->team_name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="member">Member: </label>
                                    <input type="text" class="form-control" value="<?php echo $team->member ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>