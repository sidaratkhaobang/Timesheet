<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>New Worker</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">New Worker</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Worker</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-striped active bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> -->
                        <form id="regiration_form" novalidate method="Post" action="<?php echo base_url() ?>leader_ctrl/insert_worker">

                            <!-- Step 1 -->
                            <fieldset>
                                <h2>Assign Work</h2>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="project_code">Project Code:</label>
                                        <select class="form-control" id="project_code[]" name="project_code[]">
                                        <option value="">Choose Project Code</option>
                                            <?php
                                            foreach ($project as $row) {
                                                echo '<option value="'.$row->projectCode.'">' . $row->projectCode
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="system_name">System Name:</label>
                                        <input type="text" class="form-control" id="system_name[]" name="system_name[]" placeholder="Enter System Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="module_name">Module Name:</label>
                                        <input type="text" class="form-control" id="module_name[]" name="module_name[]" placeholder="Enter Module Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="programmer">Programmer:</label>
                                        <select class="form-control" id="programmer[]" name="programmer[]">
                                            <option value="">Choose Programmer</option>
                                            <?php
                                            foreach ($user as $row) {
                                                echo '<option value="  ' . $row->firstname . '">' . $row->firstname
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="project_code">Project Code:</label>
                                        <select class="form-control" id="project_code[]" name="project_code[]">
                                            <option value="">Choose Project Code</option>
                                            <?php
                                            foreach ($project as $row) {
                                                echo '<option value="  ' . $row->projectCode . '">' . $row->projectCode
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="system_name">System Name:</label>
                                        <input type="text" class="form-control" id="system_name[]" name="system_name[]" placeholder="Enter System Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="module_name">Module Name:</label>
                                        <input type="text" class="form-control" id="module_name[]" name="module_name[]" placeholder="Enter Module Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="programmer">Programmer:</label>
                                        <select class="form-control" id="programmer[]" name="programmer[]">
                                            <option value="">Choose Programmer</option>
                                            <?php
                                            foreach ($user as $row) {
                                                echo '<option value="  ' . $row->firstname . '">' . $row->firstname
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="project_code">Project Code:</label>
                                        <select class="form-control" id="project_code[]" name="project_code[]">
                                            <option value="">Choose Project Code</option>
                                            <?php
                                            foreach ($project as $row) {
                                                echo '<option value="  ' . $row->projectCode . '">' . $row->projectCode
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="system_name">System Name:</label>
                                        <input type="text" class="form-control" id="system_name[]" name="system_name[]" placeholder="Enter System Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="module_name">Module Name:</label>
                                        <input type="text" class="form-control" id="module_name[]" name="module_name[]" placeholder="Enter Module Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="programmer">Programmer:</label>
                                        <select class="form-control" id="programmer[]" name="programmer[]">
                                            <option value="">Choose Programmer</option>
                                            <?php
                                            foreach ($user as $row) {
                                                echo '<option value="  ' . $row->firstname . '">' . $row->firstname
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="project_code">Project Code:</label>
                                        <select class="form-control" id="project_code[]" name="project_code[]">
                                            <option value="">Choose Project Code</option>
                                            <?php
                                            foreach ($project as $row) {
                                                echo '<option value="  ' . $row->projectCode . '">' . $row->projectCode
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="system_name">System Name:</label>
                                        <input type="text" class="form-control" id="system_name[]" name="system_name[]" placeholder="Enter System Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="module_name">Module Name:</label>
                                        <input type="text" class="form-control" id="module_name[]" name="module_name[]" placeholder="Enter Module Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="programmer">Programmer:</label>
                                        <select class="form-control" id="programmer[]" name="programmer[]">
                                            <option value="">Choose Programmer</option>
                                            <?php
                                            foreach ($user as $row) {
                                                echo '<option value="  ' . $row->firstname . '">' . $row->firstname
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="form-group col-3">
                                        <label for="project_code">Project Code:</label>
                                        <select class="form-control" id="project_code[]" name="project_code[]">
                                            <option value="">Choose Project code</option>
                                            <?php
                                            foreach ($project as $row) {
                                                echo '<option value="  ' . $row->projectCode . '">' . $row->projectCode
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="system_name">System Name:</label>
                                        <input type="text" class="form-control" id="system_name[]" name="system_name[]" placeholder="Enter System Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="module_name">Module Name:</label>
                                        <input type="text" class="form-control" id="module_name[]" name="module_name[]" placeholder="Enter Module Name">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="programmer">Programmer:</label>
                                        <select class="form-control" id="programmer[]" name="programmer[]">
                                            <option value="">Choose Programmer</option>
                                            <?php
                                            foreach ($user as $row) {
                                                echo '<option value="  ' . $row->firstname . '">' . $row->firstname
                                                    . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- <button  class="add_form_field btn btn-danger">Add</button> -->
                                <input type="submit" name="action" class="submit btn btn-success" value="Submit" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>