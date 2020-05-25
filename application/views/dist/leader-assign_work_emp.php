<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Assignment</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('leader_ctrl/status/'); ?>">Project</a></div>
                <div class="breadcrumb-item">Assignment</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Assignment</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>
                                <!-- <a href="<?php echo base_url('leader_ctrl/new_worker'); ?>" class="btn icon-left btn-danger"><i class="fas fa-plus"></i> New Project</a> -->
                                New Assignment
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <!-- <table border="1" cellpadding="5"> -->
                                <tr>
                                    <th>No</th>
                                    <th>project</th>
                                    <th>module</th>
                                    <th>Programmer</th>
                                </tr>
                                <?php
                                if (!empty($projectC)) {
                                    $no = 1;
                                    foreach ($projectC->result() as $data) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data->project_name; ?></td>
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
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Assignment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="" method="Post" action="<?php echo base_url() ?>leader_ctrl/insert_worker">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="project_name">Project Name</label>
                                    <select class="form-control" name="project_name" id="project_name">
                                        <option value="">Selcet Project Name</option>
                                        <?php
                                        foreach ($project->result() as $row) : ?>
                                            <option value="<?php echo $row->projectName; ?>"><?php echo $row->projectName; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="module_name">Module Name</label>
                                    <select class="form-control" name="module_name" id="module_name">
                                        <option value="">Select Module Name</option>
                                        <?php
                                        foreach ($module->result() as $row) : ?>
                                            <!-- <optgroup label="<?php echo $row->project_name; ?>"> -->
                                                <option value="<?php echo $row->module_name; ?>"><?php echo $row->module_name; ?>
                                                </option>
                                            <!-- </optgroup> -->
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <input class="form-control" type="text" placeholder="" name="module_name" id="module_name> -->
                                </div>
                                <div class=" form-group">
                                    <label for="programmer">Programmer</label>
                                    <select class="form-control" name="programmer" id="programmer">
                                        <option value="">Select Programmer</option>
                                        <?php
                                        foreach ($user->result() as $row) : ?>
                                            <option value="<?php echo $row->email; ?>"><?php echo $row->email; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="action" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>