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
                <a href="<?php echo base_url(); ?>leader_ctrl/assign" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Detail</div>
            </div>
        </div>
        <div class="card card-success">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">System name</th>
                                <th scope="col">Module name</th>
                                <th scope="col">Programmer</th>
                            </tr>
                        </thead>
                        <!-- <?php foreach ($projectC as $row) { ?> -->
                            <tr>
                                <td><?php echo $row->system_name; ?></td>
                                <td><?php echo $row->module_name; ?></td>
                                <td><?php echo $row->programmer; ?></td>
                            </tr>
                        <!-- <?php } ?> -->
                </div>
            </div>

        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>