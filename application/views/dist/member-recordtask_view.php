<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Time Tracker</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Time Tracker</div>
      </div>
    </div>
    <div class="card card-primary">
      <div class="card-header">
        <h4>What are you working on today?</h4>
        <form class="card-header-form">
          <div class="input-group">

          </div>
        </form>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-2">
            <label>Your project</label>
            <select class="form-control">
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
            <div class="invalid-feedback">
              Please fill in your work
            </div>
          </div>
          <div class="form-group col-3">
            <label>Your job type</label>
            <select class="form-control">
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
          </div>
          <div class="form-group col-4">
            <label>Describe your job description</label>
            <input type="text" class="form-control" value="" required="">
            <div class="invalid-feedback">
              Please fill in description
            </div>
          </div>
          <div class="form-group col-2">
            <label>Your working time</label>
            <input type="time" class="form-control">
          </div>
          <div class="form-group col-1">
            <label>Do it!</label>
            <button class="btn btn-primary mr-1" type="submit">Go</button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="table-2">
        <thead class="thead-dark">
            <tr>
              <th>Today</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Create a mobile app</td>
              <td>
                fix data
              </td>
              <td class="text-primary">.Time sheet
              </td>
              <td>02-12-2020</td>
              <td>08.00.00</td>
              <td>
                <div class="dropdown">
                  <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle"></a>
                  <div class="dropdown-menu">
                    <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                  </div>
                </div>
      </div>
      </td>
      </tr>
      </tbody>
      </table>
    </div>
</div>
</div>
</section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>