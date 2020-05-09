<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>New Worker</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">New Worker</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Worker</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo base_url('leader_ctrl/status/'); ?>" type="button" class="btn btn-primary">
                                    All <span class="badge badge-transparent"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form class="col-12" method="Post" action="<?php echo base_url() ?>leader_ctrl/insert_worker">
                            <input type="hidden" name="total" value="<?php $count_add; ?>">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>project Code</th>
                                    <th>System Name</th>
                                    <th>Module Name</th>
                                    <th>Programmer</th>
                                </tr>
                                <?php
                                for ($i = 1; $i <= $count_add; $i++) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><input type="text" class="form-control" id="project_code" name="project_code-<?= $i ?>" required>
                                            <!-- <select class="form-control" id="project_code" name="project_code-<?= $i ?>">
                                                <option value="">Choose Project Code</option>
                                                <?php
                                                foreach ($project as $row) {
                                                    echo '<option value="' . $row->projectCode . '">' . $row->projectCode
                                                        . '</option>';
                                                }
                                                ?>
                                            </select> -->
                                        </td>
                                        <td><input type="text" class="form-control" id="system_name" name="system_name-<?= $i ?>" required></td>
                                        <td><input type="text" class="form-control" id="module_name" name="module_name-<?= $i ?>" required></td>
                                        <td><select class="form-control" id="programmer" name="programmer-<?= $i ?>">
                                                <option value="">Choose Programmer</option>
                                                <?php
                                                foreach ($user as $row) {
                                                    echo '<option value="  ' . $row->firstname . '">' . $row->firstname
                                                        . '</option>';
                                                }
                                                ?>
                                            </select></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>