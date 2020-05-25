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
                                    <form class="col-12" id="user_form" method="Post" action="<?php echo base_url('project_ctrl/update_data/' . $data->idProject); ?>">
                                    <br>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label for="projectCode">Project Code: &nbsp;<code>*</code></label><br>
                                                <input type="text" class="form-control" id="projectCode" value="<?php echo $data->projectCode ?>" name="projectCode" onkeyup="autoTab(this),check_char(this)" required>
                                            </div>
                                            </div>
                                            <br>
                                            <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="projectName">Project Name: &nbsp;<code>*</code></label><br>
                                                <input type="text" class="form-control" id="projectName" value="<?php echo $data->projectName ?>" onkeyup="check_name(this)" name=" projectName" required>
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="budget">Budget: &nbsp;<code>*</code></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="<?php echo $data->budget ?>" onkeyup="check_num(this)" name="budget" id="budget" required>
                                                    <span class="input-group-text">THB</span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="team">Team: &nbsp;<code>*</code></label>
                                                <div class="form-group">
                                                    <select class="form-control selectric" multiple="" name="team[]" id="team">
                                                        <option value="<?php echo $data->team ?>"><?php echo $data->team ?></option>
                                                        <?php
                                                        foreach ($team as $row) : ?>
                                                            <option value="<?php echo $row->team_name; ?>"><?php echo $row->team_name; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>                                    
                                            <br><br>
                                            <div class="col-md-6">
                                                <label for="leader">Leader: &nbsp;<code>*</code></label>
                                                <div class="form-group">
                                                    <select class="form-control" name="leader" id="leader">
                                                        <option value="<?php echo $data->leader ?>"><?php echo $data->leader ?></option>
                                                        <?php
                                                        foreach ($leader as $row) : ?>
                                                            <option value="<?php echo $row->firstname; ?>"><?php echo $row->firstname; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="endDate">Start Date: &nbsp;<code>*</code></label>
                                                <input class="form-control datepicker" type="text" id="create_date" value="<?php echo $data->create_date ?>" name="create_date">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="endDate">Finish Date: &nbsp;<code>*</code></label>
                                                <input class="form-control datepicker" type="text" id="endDate" value="<?php echo $data->endDate ?>" name="endDate">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>
<script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#create_date').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#create_date').val();
            }
        });
    </script>
 