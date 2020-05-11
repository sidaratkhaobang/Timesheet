<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<footer class="main-footer">
  <div class="footer-left">
    <!-- Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> -->
  </div>
  <div class="footer-right">

  </div>
</footer>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<script type="text/javascript">
  <?php if ($this->session->flashdata('save_success')) : ?>
    swal("Good job!", "Add Data Complete!", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('record_success')) : ?>
    swal("Good job!", "You have successfully recorded your daily work.", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('add_success')) : ?>
    swal("Good job!", "Add Team Complete!", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('regis_success')) : ?>
    swal("Good job!", "Registed Complete!", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('login_wrong')) : ?>
    swal("Oops...!", " Incorrect email or password Try again or click.", "error");
  <?php endif; ?>
  <?php if ($this->session->flashdata('appove_success')) : ?>
    swal("Good job!", "Successful approval!", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('level_success')) : ?>
    swal("Good job!", "Successfully changed access authoization to the system.", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('data_duplicate')) : ?>
    swal("Oops...!", "The record has not been successful. The data is already in the system, or the data has to be reviewed and re-checked.", "error");
  <?php endif; ?>
  <?php if ($this->session->flashdata('data_except')) : ?>
    swal("Oops...!", "The hour must be greater than or equal to 8 hours.", "error");
  <?php endif; ?>

  <?php if ($this->session->flashdata('un_success')) : ?>
    swal("Oops...!", "Email dupicate!!", "error");
  <?php endif; ?>
 
  <?php if ($this->session->flashdata('decline_success')) : ?>
    swal("Good job!", " Decline project success!", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('del_success')) : ?>
    swal("Good job!", "Delete Data Success", "success");
  <?php endif; ?>

  <?php if ($this->session->flashdata('save_update')) : ?>
    swal("Good job!", "Edit Data Complete!", "success");
  <?php endif; ?>

  function confirmDelete(id){
        swal({
          title: "Are you sure?",
          text: "You won't be able to delete this!",
          type: "warning",
          showCancelButton: true, 
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },function (isConfirm) {
            $.ajax({
                url: "<?php echo base_url('Project_ctrl/delete_project/') ?>",
                type: "POST",
                data: {id:id},
                // dataType:"HTML",
                success: function () {
                    swal("Done!", "It was succesfully deleted!", "success");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                }
            });
        });
    }
    </script>
<?php $this->load->view('dist/_partials/js'); ?>