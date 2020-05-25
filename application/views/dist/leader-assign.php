<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Assignment</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('leader_ctrl/status/'); ?>">Project</a></div>
                <div class="breadcrumb-item">Assignment</div>
            </div>
        </div>
        <div class="container box">
            <br />
            <br />
            <h3 align="center">Codeigniter Dynamic Dependent Select Box using Ajax</h3>
            <br />
            <div class="form-group">
                <select name="project_name" id="project_name" class="form-control input-lg">
                    <option value="">Select Country</option>
                    <?php
                    foreach ($project->result() as $row) {
                        echo '<option value="' . $row->projectName . '">' . $row->projectName . '</option>';
                    }
                    ?>
                </select>
            </div>
            <br />
            <div class="form-group">
                <select name="module_name" id="module_name" class="form-control input-lg">
                    <option value="">Select State</option>
                    <?php
                    foreach ($module->result() as $row) {
                        echo '<option value="' . $row->module_name . '">' . $row->module_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <br />
            <div class="form-group">
                <select name="city" id="city" class="form-control input-lg">
                    <option value="">Select City</option>
                </select>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>