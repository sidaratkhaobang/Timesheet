<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_M');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Assign Work
                </div>
            </div>
        </div>
        <!-- task -->
        <section class="section">
            <div class="container mt-5">
                <div class="row">

                    <div class="col-12">
                        <div class="card card-hero">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="far fa-question-circle"></i>
                                </div>
                                <h4><?php echo $total ?></h4>
                                <div class="card-description">Number of assignments</div>
                            </div>
                            <?php if ($noti->num_rows() > 0) {
                                foreach ($noti->result() as $row) {
                            ?>
                                    <div class="card-body p-0">
                                        <div class="tickets-list">
                                            <a href="#" class="ticket-item">
                                                <div class="ticket-title">
                                                    <h4><?php echo $row->project_name ?></h4>
                                                </div>
                                                <div class="ticket-info">
                                                    <!-- Syatem&nbsp;<div class="text-primary"><?php echo $row->system_name ?></div>&nbsp;&nbsp; -->
                                                    Module&nbsp;<div class="text-primary"><?php echo $row->module_name ?></div>
                                                    <div class=" bullet"></div>
                                                    <div class="text-primary"><?php echo $row->date ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Task -->
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>