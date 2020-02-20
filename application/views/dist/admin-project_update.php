<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Project</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Update Project</div>
            </div>
        </div>
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-5 offset-sm-2 col-md-6 offset-md-6 col-lg-8 offset-lg-6 col-xl-8 offset-xl-2">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4 class="card-title">Update Project</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-text">
                                <div class="card-body">
                                    <form class="form-group col-12" id="user_form" method="Post" action="<?php echo base_url('project_ctrl/update_data/' . $data->idProject); ?>">

                                        <label for="projectCode">ProjectCode:</label><br>
                                        <input type="text" class="form-control" id="projectCode" name="projectCode" value="<?php echo $data->projectCode ?>" required>
                                        <br>

                                        <label for="projectName">ProjectName:</label><br>
                                        <input type="text" class="form-control" id="projectName" name="projectName" value="<?php echo $data->projectName ?>" required>
                                        <br>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="budget">Budget:</label>
                                                <div class="input-group-append">
                                                    <input type="text" class="form-control" name="budget" id="budget" value="<?php echo $data->budget ?>" required>
                                                    <span class="input-group-text">.00 THB</span>
                                                </div>
                                            </div>
                                            <div class=" col-md-6">
                                                <label for="team">Team:</label>
                                                <div class="input-group-append">
                                                    <select class="form-control selectric" multiple="" name="team[]" id="team">
                                                        <option><?php echo $data->team ?></option>
                                                        <?php
                                                        foreach ($team as $row) {
                                                            echo '<option value="  ' . $row->NameTeam . '">' . $row->NameTeam
                                                                . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="endDate">Finish Date:</label>
                                                <input class="form-control datepicker" type="text" id="endDate" name="endDate" value="<?php echo $data->endDate ?>">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="offset-sm-8 col-sm-10">
                                            <button type="submit" name="action" class="btn btn-primary">Save</button> &nbsp;
                                            <a href="<?php echo base_url('Project_ctrl/project') ?>"><button type="button" class="btn btn-default center-block">Cancel</button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- <p class="card-text">Using the most <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables. </p> -->
                        </div>
                    </div>
                </div>
            </div>
</section>
</div>
</div>
</div>
</div>
</section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>