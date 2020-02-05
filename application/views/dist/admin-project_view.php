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
          <!-- End Main Content -->

          <!-- Table -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
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
                    ?>
                        <tr>
                          <td><?php echo $row->idProject; ?></td>
                          <td><?php echo $row->projectCode; ?></td>
                          <td><?php echo $row->projectName; ?></td>
                          <td><?php echo $row->budget; ?>.00</td>
                          <td><img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="<?php echo $row->team; ?>"></td>
                          <td><?php echo $row->endDate; ?></td>
                          <td><?php echo $row->status; ?>
                          
                          </td>
                          <td>
                            
                            <a href="#" class="btn btn-icon btn-primary" title="Edit"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-danger" title="Delete"><i class="fas fa-times"></i></a>
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
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>