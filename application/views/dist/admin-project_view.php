<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main  -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Project</h1>
      <div class="section-header-breadcrumb">
        <!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div> -->
        <div class="breadcrumb-item">All Project</div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Project Table</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                  <div class="buttons">
                    <a href="<?php echo base_url('project_ctrl/create_project'); ?>" class="btn  icon-left btn-danger"><i class="fas fa-plus"></i> New Project</a>
                  </div>
                  <input type="text" class="form-control" placeholder="Search..." name="search" id="search" value="<?php if ($this->input->get('search')) echo $this->input->get('search'); ?>">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
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
                if ($select_data->num_rows() > 0) {
                  foreach ($select_data->result() as $row) {
                    // $got = $row->team;
                    $value = explode(',', $row->team);
                ?>
                    <tr>
                      <td><?php echo $row->idProject; ?></td>
                      <td><?php echo $row->projectCode; ?></td>
                      <td><?php echo $row->projectName; ?></td>
                      <td><?php echo number_format($row->budget); ?></td>
                      <td>
                        <div class="dropdown">
                          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="fas fa-users"></i></i></a>
                          <div class="dropdown-menu">
                            <?php foreach ($value as $rows) { ?>
                              <a href="#" class="dropdown-item has-icon"><i class="far fa-user"></i><?php echo $rows ?> <br></a>
                            <?php } ?>
                          </div>
                        </div>
                      </td>
                      <td><?php echo $row->endDate; ?></td>
                      <td>
                        <?php if ($row->status === '1') { ?>
                          <div class="badge badge-success">Accept</div>
                        <?php } elseif ($row->status === '2') { ?>
                          <div class="badge badge-danger">Decline</div>
                        <?php } else { ?>
                          <div class="badge badge-warning">Waiting</div>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url('Project_ctrl/update_project/' . $row->idProject); ?>" class="edit"><i class='fas fa-edit' title="Edit"></i></a>
                        <a href="<?php echo base_url('Project_ctrl/delete_project/' . $row->idProject); ?>" onclick="return confirm('confirm delete?');" data-toggle="tooltip"><i class="fas fa-trash-alt" style="color:red" title="Delete"></i></a>
            </div>
          </div>
          </td>
          </tr>
      <?php
                  }
                }
      ?>
      </table>
        </div>
        <div class="card-footer text-right">
          <nav class="d-inline-block">
            <ul class="pagination mb-0">
              <?php echo $pagination; ?>
            </ul>
          </nav>
        </div>
      </div>

    </div>
</div>
</section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>