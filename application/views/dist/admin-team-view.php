<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Team</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Team</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Team</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                            <div class="buttons">
                                <a href="<?php echo base_url('team_ctrl/team'); ?>" class="btn  icon-left btn-danger"><i class="fas fa-plus"></i> New Team</a>
                            </div>
                        </div>
                    </div>
                    <table border="1" cellpadding="5">
                        <tr>
                            <th>No</th>
                            <th>Team</th>
                            <th>Programmer</th>
                        </tr>
                        <?php
                        if (!empty($data_team)) {
                            $no = 1;
                            foreach ($data_team->result() as $data) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data->team_name; ?></td>
                                    <td><?php echo $data->member; ?></td>
                                </tr>
                        <?php
                                $no++;
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>