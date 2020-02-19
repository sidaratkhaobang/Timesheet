<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  
  <script type="text/javascript">
  <?php if ($this->session->flashdata('save_success')) : ?>
    swal("", "Add Data Complete!", "success");
  <?php endif; ?>

  <?php if ($this->session->flashdata('un_success')) : ?>
    swal("", "Email not registered!!", "error");
  <?php endif; ?>

  <?php if ($this->session->flashdata('del_success')) : ?>
    swal("", "Delete Data Success", "success");
  <?php endif; ?>

  <?php if ($this->session->flashdata('save_update')) : ?>
    swal("", "Edit Data Complete!", "success");
  <?php endif; ?>
</script>
<?php $this->load->view('dist/_partials/js'); ?>
