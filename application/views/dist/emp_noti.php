<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_M');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Assignments
                </div>
            </div>
        </div>

        <!-- task -->
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 mb-4 ">
                        <div class="card card-hero">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="card-description">Number of assignments</div>
                                <h4><?php echo $total ?></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($noti->num_rows() > 0) {
                    foreach ($noti->result() as $row) {
                ?>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4><?php echo $row->project_name ?></h4>
                                        <div class="card-header-action">
                                            <a href="<?php echo base_url('Emp_ctrl/task_emp') ?>" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i>Do</a>
                                            <a href="#" class="btn btn-success btn-sm comfirm-record" data-id_worker="<?php echo $row->id_worker; ?>"><i class="fas fa-check"></i>Done</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p><?php echo $row->system_name ?><span class="bullet"></span>&nbsp;<code><?php echo $row->module_name ?><span class="bullet"></span></code>&nbsp;<?php echo $row->date ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </section>
        <!-- End Task -->
    </section>


    <!-- Delete Package Modal -->
    <form action="<?php echo site_url('emp_ctrl/delete'); ?>" method="post">
        <div class="modal fade" id="DeleteWork" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ยืนยัน</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>คุณแน่ใจที่จะยืนยันดำเนินการนี้?</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="delete_worker_id" required>
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
<script>
    $(document).ready(function() {

        //GET CONFIRM DELETE
        $(".comfirm-record").on("click", function() {
            var id_worker = $(this).data("id_worker");
            $("#DeleteWork").modal("show");
            $('[name="delete_worker_id"]').val(id_worker);
        });
    });
</script>