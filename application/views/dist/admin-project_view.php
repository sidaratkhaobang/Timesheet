<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Project</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Project</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Project Table</h4>
            <div class="card-header-form">
            </div>
          </div>
          <!-- End Main Content -->
          <!-- Table -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th scope="col">ProjectCode</th>
                    <th scope="col">ProjectName</th>
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
                    $got = $row->team;
                    $value = explode(',', $got);
                ?>
                    <tr>
                      <td><?php echo $row->idProject; ?></td>
                      <td><?php echo $row->projectCode; ?></td>
                      <td><?php echo $row->projectName; ?></td>
                      <td><?php echo $row->budget; ?>.00</td>
                      <td>
                        <div class="dropdown">
                          <a href="#" data-toggle="dropdown" class="btn btn-primary  dropdown-toggle"><i class="far fa-user"></i></a>
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
                        <a href="<?php echo base_url('Project_ctrl/update_project/' . $row->idProject); ?>" class="btn btn-sm btn-icon btn-primary" title="Edit"><i class="far fa-edit"></i></a>
                        <!-- <a href="<?php echo base_url('Project_ctrl/delete_project/' . $row->idProject); ?>" onclick="return confirm('confirm delete?');" class="btn btn-sm  btn-icon btn-danger" title="Delete"><i class="fas fa-times"></i></a> -->
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
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>