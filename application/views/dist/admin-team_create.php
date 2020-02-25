<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Team</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Create Team</div>
            </div>
        </div>
        <!-- <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-wrapper-before"></div>
                <div class="content-header">
                    <div class="content-body"> -->
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-5 offset-sm-2 col-md-6 offset-md-6 col-lg-8 offset-lg-6 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Create Team</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-text">
                                <div class="card-body">
                                    <form class="col-12" id="user_form" method="Post" action="<?php echo base_url() ?>team_ctrl/insert_data">

                                        <br>
                                        <label for="nameteam">Name Team:</label><br>
                                        <input type="text" class="form-control" id="nameteam" placeholder="Enter Name Team" name="nameteam" required>
                                        <br>
                                            <label for="member"><i  class="fas fa-user-plus"></i> Member:</label>
                                            <div class="input-group-append">
                                                <select class="form-control select2" multiple="" name="member[]" id="member">
                                                    <option value=""></option>
                                                    <?php
                                                    foreach ($user as $row) {
                                                        echo '<option value="  ' . $row->firstname . '">' . $row->firstname
                                                            . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="offset-sm-8 col-sm-10">
                                            <button type="submit" name="action" class="btn btn-primary">Add</button> &nbsp;
                                            <a href="<?php echo base_url('Project_ctrl/project') ?>"><button type="button" class="btn btn-default center-block">Cancel</button></a>
                                        </div>
                                    </form>
                                </div>
                                <br>

                                <!-- <p class="card-text">Using the most <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables. </p> -->
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </section>
    </section>
</div>

<!-- </div>
                </div>
            </div>
        </div> -->
<!-- </section>
</div> -->
<?php $this->load->view('dist/_partials/footer'); ?>