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
    swal("เพิ่มข้อมูลสำเร็จ", "กรุณากด ตกลง เพื่อดำเนินการต่อ", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('record_success')) : ?>
    swal("คุณบันทึกงานประจำวันเรียบร้อยแล้ว", "กรุณากด ตกลง เพื่อดำเนินการต่อ", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('add_success')) : ?>
    swal("เพิ่มสมาชิกในทีมได้สำเร็จ", "กรุณากด ตกลง เพื่อดำเนินการต่อ", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('register_success')) : ?>
    swal("ลงทะเบียนสำเร็จ", "กรุณากด ตกลง เพื่อสามารถเข้าสู่ระบบได้", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('login_wrong')) : ?>
    swal("อีเมลหรือรหัสผ่านไม่ถูกต้อง", "กรุณาลองใหม่อีกครั้ง", "error");
  <?php endif; ?>
  <?php if ($this->session->flashdata('appove_success')) : ?>
    swal("การอนุมัติโครงการสำเร็จ", "การอนุมัติโครงการสำเร็จ!", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('level_success')) : ?>
    swal("เปลี่ยนการอนุญาตการเข้าใช้ระบบสำเร็จ", "เปลี่ยนการอนุญาตการเข้าใช้ระบบสำเร็จ", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('data_duplicate')) : ?>
    swal("การบันทึกไม่สำเร็จ", "ข้อมูลอยู่ในระบบอยู่แล้วหรือต้องตรวจสอบและตรวจสอบข้อมูลอีกครั้ง", "error");
  <?php endif; ?>
  <?php if ($this->session->flashdata('data_except')) : ?>
    swal("การบันทึกไม่สำเร็จ", "ชั่วโมงต้องมากกว่าหรือเท่ากับ 8 ชั่วโมง", "error");
  <?php endif; ?>
  <?php if ($this->session->flashdata('unsuccess')) : ?>
    swal("การลงทะเบียนไม่สำเร็จ", "ข้อมูลอยู่ในระบบอยู่แล้วหรือต้องตรวจสอบและตรวจสอบข้อมูลอีกครั้ง", "error");
  <?php endif; ?>
  <?php if ($this->session->flashdata('decline_success')) : ?>
    swal("การปฏิเสธโครงการสำเร็จ", "การปฏิเสธโครงการสำเร็จ", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('del_success')) : ?>
    swal("ลบข้อมูลสำเร็จ", "ลบข้อมูลสำเร็จ", "success");
  <?php endif; ?>
  <?php if ($this->session->flashdata('save_update')) : ?>
    swal("แก้ไขข้อมูลสำเร็จ", "แก้ไขข้อมูลสำเร็จ", "success");
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