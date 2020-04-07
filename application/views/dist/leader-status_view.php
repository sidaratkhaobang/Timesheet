<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Approve Projects</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Approve Projects</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Project Table</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo base_url('leader_ctrl/status/'); ?>" type="button" class="btn btn-primary">
                                    All <span class="badge badge-transparent"></span>
                                </a>
                                <a href="<?php echo base_url('leader_ctrl/status_approve/'); ?>" type="btn-group btn-group-sm" class="btn btn-success">
                                    Approve <span class="badge badge-transparent"></span>
                                </a>
                                <a href="<?php echo base_url('leader_ctrl/status_wait/'); ?>" type="btn-group btn-group-sm" class="btn btn-warning">
                                    Waiting <span class="badge badge-transparent"></span>
                                </a>
                                <a href="<?php echo base_url('leader_ctrl/status_decl/'); ?>" type="btn-group btn-group-sm" class="btn btn-danger">
                                    Decline <span class="badge badge-transparent"></span>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- End Main Content -->
                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col">Project Code</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Budget(THB)</th>
                                        <th scope="col">Team</th>
                                        <th scope="col">Finish Date</th>
                                        <th scope="col">Status</th>
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <?php
                                if ($select_data->num_rows() > 0) {
                                    foreach ($select_data->result() as $row) {
                                        $got = $row->team;
                                        $value = explode(',', $got);
                                ?>
                                        <tr>
                                            <td><?php echo $row->idProject; ?></td>
                                            <td><?php echo $row->projectCode; ?></td>
                                            <td><?php echo $row->projectName; ?></td>
                                            <td><?php echo $row->budget; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="fas fa-users"></i></a>
                                                    <div class="dropdown-menu">
                                                        <!-- get team -->
                                                        <?php foreach ($value as $rows) { ?>
                                                            <a href="#" class="dropdown-item has-icon"><i class="far fa-user"></i><?php echo $rows ?> <br></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $row->endDate; ?></td>
                                            <td>
                                                <!-- if status  -->
                                                <?php if ($row->status === '1') { ?>
                                                    <div class="badge badge-success">Approve</div>
                                                <?php } elseif ($row->status === '2') { ?>
                                                    <div class="badge badge-danger">Decline</div>
                                                <?php } else { ?>
                                                    <div class="badge badge-warning">Waiting</div>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7" style="text-align:center;">No Data</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <ul class="list-inline mb-0">
                        <ul class="pagination">
                            <?php echo $pagination; ?>
                        </ul>
                    </ul>
                </div>
            </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>