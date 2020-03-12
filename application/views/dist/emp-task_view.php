<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_M');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Time Task</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Time Task</div>
      </div>
    </div>
    <!-- What are you working on today -->
    <div class="card card-primary">
      <div class="card-header">
        <h4>What are you working on today?</h4>
        <form class="card-header-form" method="Post" action="<?php echo base_url() ?>Emp_ctrl/insert_data">
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-3">
            <label>Your project*</label>
            <select class="form-control" id="project_name" name="project_name" required>
              <option value="">choose your project</option>
              <?php
              foreach ($projectName as $row) {
                echo '<option value="  ' . $row->projectName . '">' . $row->projectName
                  . '</option>';
              }
              ?>
            </select>
            <div class="invalid-feedback">
              Please fill in your work
            </div>
          </div>
          <div class="form-group col-3">
            <label>Task Type*</label>
            <select class="form-control" id="task_type" name="task_type" required autofocus>
              <option value="">choose your task type</option>
              <?php
              foreach ($task_type as $row) {
                echo '<option value="  ' . $row->task_type . '">' . $row->task_type
                  . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group col-3">
            <label>Task Description</label>
            <input type="text" class="form-control" id="des_task" name="des_task" value="" required autofocus>
            <div class="invalid-feedback">
              Please fill in description
            </div>
          </div>
          <div class="form-group col-2">
            <label>Your working time/hrs*</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-clock"></i>
                  <div class="invalid-feedback">
                    Please fill in description
                  </div>
                </div>
              </div>
              <input type="text" class="form-control number" name="hours" id="hours" required autofocus>
            </div>
          </div>
          <div class="form-group col-1">
            <label>Do it!</label>
            <button type="submit" name="action" id="toastr-3" class="btn btn-primary mr-1">Go</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- End -->

    <!-- Task -->
    <div class="col-12 col-6">
      <div class="section-body">
        <h2 class="section-title">Daily work log</h2>
        <!-- Search form -->
        <form class="form-inline active-cyan-4">
          <input class="form-control form-control-sm mr-3 w-25" id="listSearch" type="text" class="form-control form-control-sm mr-3 w-25" placeholder="Search..." name="search" id="search" value="<?php if ($this->input->get('search')) echo $this->input->get('search'); ?>">
          <i class="fas fa-search" aria-hidden="true"></i>
        </form>
      </div><br>
        <!-- End Search form --> 
      <div class="row">
        <div class="col-12">
          <?php
          if ($select_data->num_rows() > 0) {
            foreach ($select_data->result() as $row) {
              // $date_create = $this->Emp_ctrl->get_nice_date($row->hours,'full');
          ?>
              <div class="activities">
                <div class="activity">
                  <div class="activity-icon bg-primary text-white shadow-primary">
                    <i class="fas fa-calendar-check"></i>
                  </div>
                  <div class="activity-detail" id="myList">
                    <div class="mb-2">
                      <span class="text-job text-primary"><?php echo $row->date; ?> </span>
                      <span class="bullet"></span>
                      <!-- <a class="text-job" href="#">View</a> -->
                      <!-- <div class="float-right dropdown"> 
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon text-warning"><i class="fas fa-list"></i>Edit</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div>
                        </div> -->
                    </div>
                    <p><?php echo $row->task_type; ?> <?php echo $row->des_task; ?> of project "<a class="text-primary"><?php echo $row->project_name; ?></a>"
                      a total of <?php echo $row->hours; ?> hours </p>
                  </div>
                </div>
            <?php }
          } ?>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>
<!-- <script>
  $(document).ready(function() {
    $("#listSearch").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myList li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script> -->