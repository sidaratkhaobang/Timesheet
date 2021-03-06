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
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Project Table</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                  <div class="buttons">
                    <a href="<?php echo base_url('project_ctrl/create_project'); ?>" class="btn icon-left btn-danger"><i class="fas fa-plus"></i> New Project</a>
                  </div>
                  <input type="text" class="form-control" placeholder="Search..." name="search" id="search" value="<?php if ($this->input->get('search')) echo $this->input->get('search'); ?>">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              <div class="btn-group btn-group-sm">
                <a href="<?php echo base_url('Project_ctrl/project/'); ?>" type="button" class="btn btn-primary">
                  All <span class="badge badge-transparent"></span>
                </a>
                <a href="<?php echo base_url('Project_ctrl/status_approve/'); ?>" type="btn-group btn-group-sm" class="btn btn-success">
                  Approve <span class="badge badge-transparent"></span>
                </a>
                <a href="<?php echo base_url('Project_ctrl/status_wait/'); ?>" type="btn-group btn-group-sm" class="btn btn-warning">
                  Waiting <span class="badge badge-transparent"></span>
                </a>
                <a href="<?php echo base_url('Project_ctrl/status_decl/'); ?>" type="btn-group btn-group-sm" class="btn btn-danger">
                  Decline <span class="badge badge-transparent"></span>
                </a>
              </div>
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
                        <a href="#" class="delete-record" data-id_team="<?php echo $row->idProject; ?>"><i class="fas fa-trash-alt" style="color:red" title="Delete"></i></a>
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
  </section>
  <!-- Delete Package Modal -->
  <form action="<?php echo site_url('Project_ctrl/delete_project'); ?>" method="post">
    <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ยืนยัน</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <h4>คุณแน่ใจที่จะลบโครงการนี้?</h4>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="delete_id" required>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success btn-sm">ตกลง</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End Delete -->
</div>
<?php $this->load->view('dist/_partials/footer'); ?>