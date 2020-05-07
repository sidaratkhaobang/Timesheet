<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Generate Number Wroker</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">New Worker</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-5 offset-sm-2 col-md-6 offset-md-6 col-lg-8 offset-lg-6 col-xl-8 offset-xl-2">
                <form class="col-12" action="<?php echo base_url() ?>leader_ctrl/new_worker" method=" post">
                    <div class="form-group">
                        <label for="count_add">Generate Number</label>
                        <input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]" class="form-control" require>
                    </div>
                    <div class="offset-sm-10 col-sm-8">
                        <input type="submit" name="generate" value="Generate" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>