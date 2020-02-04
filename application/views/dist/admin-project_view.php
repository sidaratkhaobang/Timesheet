<!-- <?php
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
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>#</th>
                  <th scope="col">ProjectCode</th>
                  <th scope="col">ProjectName</th>
                  <th scope="col">Budget/THB</th>
                  <th scope="col">Team</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">Finish Date</th>
                  <th scope="col">Action</th>
                </tr>
                <tr>
                  <td class="p-0 text-center">
                  </td>
                  <td>Create a mobile app</td>
                  <td class="align-middle">
                    <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                      <div class="progress-bar bg-success" data-width="100"></div>
                    </div>
                  </td>
                  <td>
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                  </td>
                  <td>2018-01-20</td>
                  <td>
                    <div class="badge badge-success">Completed</div>
                  </td>
                  <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
                <?php
                  if ($select_data->num_rows() > 0) {
                    foreach ($select_data->result() as $row) {
                  ?>
                      <tr>
                        <td><?php echo $row->idProject; ?></td>
                        <td><?php echo $row->projectCode; ?></td>
                        <td><?php echo $row->projectName; ?></td>
                        <td><?php echo $row->budget; ?>.00</td>
                        <td><?php echo $row->team; ?></td>
                        <td><?php echo $row->startDate; ?></td>
                        <td><?php echo $row->endDate; ?></td>
                        <td>
                          <a href="<?php echo base_url('Project_ctrl/update_project/'.$row->idProject); ?>" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                          <a href="<?php echo base_url('Project_ctrl/delete_project/'.$row->idProject); ?>" onclick="return confirm('confirm delete?');" data-toggle="tooltip" class="remove" data-toggle="modal"><i class="material-icons" title="Delete">&#xE872;</i></a>
                        </td>
                      </tr>
                    <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="5">No Data</td>
                    </tr>
                  <?php
                  }
                  ?>
                </table>
                <!-- <tr>
                  <td class="p-0 text-center">
                  </td>
                  <td>Redesign homepage</td>
                  <td class="align-middle">
                    <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                      <div class="progress-bar" data-width="0"></div>
                    </div>
                  </td>
                  <td>
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Nur Alpiana">
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-3.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hariono Yusup">
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Bagus Dwi Cahya">
                  </td>
                  <td>2018-04-10</td>
                  <td>
                    <div class="badge badge-info">Todo</div>
                  </td>
                  <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
                <tr>
                  <td class="p-0 text-center">
                  </td>
                  <td>Backup database</td>
                  <td class="align-middle">
                    <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                      <div class="progress-bar bg-warning" data-width="70"></div>
                    </div>
                  </td>
                  <td>
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hasan Basri">
                  </td>
                  <td>2018-01-29</td>
                  <td>
                    <div class="badge badge-warning">In Progress</div>
                  </td>
                  <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
                <tr>
                  <td class="p-0 text-center">
                  </td>
                  <td>Input data</td>
                  <td class="align-middle">
                    <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                      <div class="progress-bar bg-success" data-width="100"></div>
                    </div>
                  </td>
                  <td>
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                  </td>
                  <td>2018-01-16</td>
                  <td>
                    <div class="badge badge-success">Completed</div>
                  </td>
                  <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
              </table> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?> -->