<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="<?php echo base_url("/theme-assets/images/backgrounds/01.jpg") ?>">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="<?php echo base_url("/theme-assets/images/logo/calendar.png") ?>" />
                    <h3 class="brand-text">Time sheet</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class="active"><a href="<?php echo base_url("project_ctrl/project") ?>"><i class="la la-credit-card"></i><span class="menu-title" data-i18n="">Projects</span></a>
      </li> 
      <li class=" nav-item"><a href="icons.html"><i class="la la-group"></i><span class="menu-title" data-i18n="">Members</span></a>
      </li>
    </ul>
    <div class="colorlib-footer">
    </div>
  </div><a class="btn btn-dark btn-block btn-glow btn-upgrade-pro mx-1" href="">Admin</a>
  <div class="navigation-background"></div>
</div>

<!-- ############################################################################################################### -->

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header">
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Project</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-text">
                                <div class="card-body">
                                    <form class="form-group col-12" id="user_form" method="Post" action="<?php echo base_url() ?>project_ctrl/insert_data">

                                        <label for="projectCode">ProjectCode:</label><br>
                                        <input type="text" class="form-control" id="projectCode" placeholder="Enter Project Code" name="projectCode" required>
                                        <br>

                                        <label for="projectName">ProjectName:</label><br>
                                        <input type="text" class="form-control" id="projectName" placeholder="Enter Project Name" name="projectName" required>
                                        <br>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="budget">Budget:</label>
                                                <div class="input-group-append">
                                                    <input type="text" class="form-control" placeholder="Enter Budget" name="budget" id="budget" required>
                                                    <span class="input-group-text">.00 THB</span>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="col-md-6">
                                                <label for="team">Team:</label>
                                                <div class="input-group-append">
                                                <select  class="selectpicker" multiple data-live-search="true" name="team" id="team">
                                                    <option value=""></option>
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
                                                <label for="startD">Start Date</label>
                                                <input data-format="dd/MM/yyyy" class="form-control" type="date" id="startD" name="startD">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="endD">End Date</label>
                                                <input data-format="dd/MM/yyyy" class="form-control" type="date" id="eendD" name="endD">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="offset-sm-8 col-sm-10">
                                            <button type="submit" name="action" class="btn btn-info center-block" id="btn_create">Add</button> &nbsp;
                                            <a href="<?php echo base_url('Project_ctrl/project')?>"><button type="button" class="btn btn-default center-block">Cancel</button></a>
                                        </div>
                                    </form>
                                    <!-- <p class="card-text">Using the most <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables. </p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<!-- Datepicker -->
        <!-- <div class="container">
            <div class='col-md-5'>
                <div class='input-group date' id='datetimepicker6'>
                    <div class="input-group-append">
                        <input type='text' class="form-control" />
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        </span>
                    </div>
                </div>

                <div class='col-md-5'>
                    <div class='input-group date' id='datetimepicker7'>
                        <div class="input-group-append">
                            <input type='text' class="form-control" />
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div> -->
<!-- End Datepicker -->