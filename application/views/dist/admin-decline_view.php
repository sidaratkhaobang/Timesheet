<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
// $this->load->view('dist/_partials/sidebar');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Project</h1>
            <div class="section-header-breadcrumb">
                
                <div class="breadcrumb-item">Decline Project</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Project Table</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <div class="buttons">
                                        <a href="<?php echo base_url('project_ctrl/create_project'); ?>" class="btn icon-left btn-danger"><i class="fas fa-plus"></i> New Project</a>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search..." name="search" id="search" value="<?php if ($this->input->get('search')) echo $this->input->get('search'); ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo base_url('Project_ctrl/project/'); ?>" type="button" class="btn btn-primary">
                                    All <span class="badge badge-transparent"></span>
                                </a>
                                <a href="<?php echo base_url('Project_ctrl/status_approve/'); ?>" type="btn-group btn-group-sm" class="btn btn-success">
                                    Approve <span class="badge badge-transparent"></span>
                                </a>
                                <a href="<?php echo base_url('Project_ctrl/status_wait/'); ?>" type="btn-group btn-group-sm" class="btn btn-warning">
                                    Waiting <span class="badge badge-transparent"></span>
                                </a>
                                <a href="<?php echo base_url('Project_ctrl/status_decl/'); ?>" type="btn-group btn-group-sm" class="btn btn-danger">
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
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                if ($data_decl->num_rows() > 0) {
                                    foreach ($data_decl->result() as $row) {
                                        $got = $row->team;
                                        $value = explode(',', $got);
                                ?>
                                        <tr>
                                            <td><?php echo $row->idProject; ?></td>
                                            <td><?php echo $row->projectCode; ?></td>
                                            <td><?php echo $row->projectName; ?></td>
                                            <td><?php echo number_format($row->budget); ?></td>
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
                                                <?php if ($row->status === '2') { ?>
                                                    <div class="badge badge-danger">Decline</div>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('Project_ctrl/update_project/' . $row->idProject); ?>" class="edit"><i class='fas fa-edit' title="Edit"></i></a>
                                                <a href="<?php echo base_url('Project_ctrl/delete_project/' . $row->idProject); ?>" onclick="return confirm('confirm delete?');" data-toggle="tooltip"><i class="fas fa-trash-alt" style="color:red" title="Delete"></i></a>
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
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>