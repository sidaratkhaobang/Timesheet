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
        <!-- data-toggle="modal" data-target="#addNewModal" -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Team</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                            <a href="<?php echo base_url('Team_ctrl/form_team'); ?>" class="btn  icon-left btn-danger"><i class="fas fa-plus"></i> New Team</a>
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
                                    <th>Action</th>
                                </tr>
                                <?php
                                if ($data_team->num_rows() > 0) {
                                    foreach ($data_team->result() as $data) {
                                ?>
                                        <tr>
                                            <td><?php echo $data->id_team; ?></td>
                                            <td><?php echo $data->team_name; ?></td>
                                            <td>
                                                <?php echo $data->member ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('Team_ctrl/update_team/' . $data->id_team); ?>" class="btn btn-info btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete-record" data-id_team="<?php echo $data->id_team; ?>">Delete</a>
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
    <!-- Delete Package Modal -->
    <form action="<?php echo site_url('team_ctrl/delete'); ?>" method="post">
        <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Team</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Are you sure to delete this package?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="delete_id" required>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success btn-sm">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Delete -->
<?php $this->load->view('dist/_partials/footer'); ?>