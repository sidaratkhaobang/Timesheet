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
    
    <div class="card-body">
      <div class="row">
      <div class="form-group col-3">
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
          <select class="form-control">
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
          </select>
        </div>
        <div class="form-group col-3">
          <input type="text" class="form-control" value="Description" required="">
          <div class="invalid-feedback">
            Please fill in description
          </div>
        </div>
        <div class="form-group col-2">
          <input type="time" class="form-control">
        </div>
        <div class="form-group col-1">
          <button class="btn btn-primary mr-1" type="submit">Submit</button>
        </div>
        <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            
                            <th>Date</th>
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
                            <td
                           class="text-primary">.Time sheet
                            </td>
                            <td>02-12-2020</td>
                            <td>08.00.00</td>
                            
                            <td><a href="#" class="btn btn-icon btn-primary" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger" title="Delete"><i class="fas fa-times"></i></a></td>
                          </tr>
                          <tr>
                           
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
      </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>