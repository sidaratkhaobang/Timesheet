<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Project</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Create Project</div>
            </div>
        </div>
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-5 offset-sm-2 col-md-6 offset-md-6 col-lg-8 offset-lg-6 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Create Project</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-text">
                                <div class="card-body">
                                    <form class="col-12" id="user_form" method="Post" action="<?php echo base_url() ?>project_ctrl/insert_data">
                                        <br>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label for="projectCode">Project Code: &nbsp;<code>*</code></label><br>
                                                <input type="text" class="form-control" id="projectCode" placeholder="ex.0102010-02 or ex.THM0360-01" name="projectCode" onkeyup="autoTab(this),check_char(this)" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="projectName">Project Name: &nbsp;<code>*</code></label><br>
                                                <input type="text" class="form-control" id="projectName" placeholder="Enter Project Name" onkeyup="check_name(this)" name=" projectName" required>
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="budget">Budget: &nbsp;<code>*</code></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Enter Budget" onkeyup="check_num(this)" name="budget" id="budget" required>
                                                    <span class="input-group-text">THB</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="team">Team: &nbsp;<code>*</code></label>
                                                <div class="form-group">
                                                    <select class="form-control selectric" multiple="" name="team[]" id="team">
                                                        <option value="">Choose Team</option>
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
                                                        <option value="">Choose Leader</option>
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
                                                <label for="create_date">Start Date: &nbsp;<code>*</code></label>
                                                <input class="form-control datepicker" type="text" id="create_date" name="create_date">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="endDate">Finish Date: &nbsp;<code>*</code></label>
                                                <input class="form-control datepicker" type="text" id="endDate" name="endDate">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <label class="custom-switch mt-2">
                                                <input checked type="checkbox" id="status" name="status" value="3" class="custom-switch-input">
                                            </label>
                                        </div>
                                        <br>
                                        <table class="table" id="dynamic_field">
                                            <tr>
                                                <label for="endDate">Module Name: &nbsp;<code>*</code></label>
                                                <td><input type="text" name="module_name[]" id="module_name" placeholder="Enter your Name" class="form-control name_list" required="" /></td>
                                                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                            </tr>
                                        </table>
                                        <br>
                                        <div class="offset-sm-8 col-sm-10">
                                            <button type="submit" name="action" class="btn btn-primary">Add</button> &nbsp;
                                            <a href="<?php echo base_url('Project_ctrl/project') ?>"><button type="button" class="btn btn-default center-block">Cancel</button></a>
                                        </div>
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
        maxDate: function() {
            return $('#endDate').val();
        }
    });
    $('#endDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        minDate: function() {
            return $('#create_date').val();
        }
    });
</script>