<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Assignment of Member</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('leader_ctrl/status/'); ?>">Project</a></div>
                <div class="breadcrumb-item">Assignment of Member</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Assignment</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                            <div class="buttons">
                                <a href="<?php echo base_url('leader_ctrl/generate/'); ?>" class="btn  icon-left btn-danger"><i class="fas fa-plus"></i> New Worker</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <!-- <table border="1" cellpadding="5"> -->
                                <tr>
                                    <th>No</th>
                                    <th>project</th>
                                    <th>system</th>
                                    <th>module</th>
                                    <th>program</th>
                                </tr>
                                <?php
                                if (!empty($projectC)) {
                                    $no = 1;
                                    foreach ($projectC->result() as $data) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data->project_code; ?></td>
                                            <td><?php echo $data->system_name; ?></td>
                                            <td><?php echo $data->module_name; ?></td>
                                            <td><?php echo $data->programmer; ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <?php
                        if ($projectC->num_rows() > 0) {
                            foreach ($projectC->result() as $row) { ?>
                                <div class="col-lg-6">
                                    <div class="card card-large-icons">
                                        <div class="card-icon bg-primary text-white">
                                            <i class="fas fa-file-alt"></i>
                                        </div>

                                        <div class="card-body">
                                            <h4><?php echo $row->project_code; ?></h4>
                                            <a href="<?php echo base_url('leader_Ctrl/detail/' . $row->project_code); ?>" class="card-cta">View Detail <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                        }
                        ?>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>