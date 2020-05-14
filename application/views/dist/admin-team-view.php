<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Team</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('project_ctrl/project'); ?>">All Project</a></div>
                <div class="breadcrumb-item">Team</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Team</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                            <div class="buttons">
                                <a href="<?php echo base_url('team_ctrl/team'); ?>" class="btn  icon-left btn-danger"><i class="fas fa-plus"></i> New Team</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <!-- <table border="1" cellpadding="5"> -->
                                <tr>
                                    <th>No</th>
                                    <th>Team</th>
                                    <th>Programmer</th>
                                </tr>
                                <?php
                                if ($data_team->num_rows() > 0) {
                                    foreach ($data_team->result() as $data) {
                                        // $got = $data->member;
                                        // $value = explode(',', $got); ?>
                                        <tr>
                                            <td><?php echo $data->id_team; ?></td>
                                            <td><?php echo $data->team_name; ?></td>
                                            <td>
                                                <?php echo $data->member ?>
                                            <!-- <div class="dropdown">
                                                <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="fas fa-users"></i></i></a>
                                                <div class="dropdown-menu">
                                                    <?php foreach ($value as $rows) { ?>
                                                        <a href="#" class="dropdown-item has-icon"><i class="far fa-user"></i><?php echo $rows ?> <br></a>
                                                    <?php } ?>
                                                </div>
                                            </div> -->
                                            </td>
                                        </tr>
                                <?php

                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>