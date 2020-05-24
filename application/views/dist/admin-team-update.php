<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Team</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('team_ctrl/dataTeam'); ?>">Team</a></div>
                <div class="breadcrumb-item">Update Team</div>
            </div>
        </div>
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-5 offset-sm-2 col-md-6 offset-md-6 col-lg-8 offset-lg-6 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Update Team</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-text">
                                <div class="card-body">
                                    <form class="col-12" id="user_form" method="Post" action="<?php echo base_url('team_ctrl/update_data/' . $data->id_team); ?>">
                                        <label for="team_name">Name Team:</label><br>
                                        <input type="text" class="form-control" id="team_name" onkeyup="check_name(this)" name="team_name" value="<?php echo $data->team_name ?>" required>
                                        <br>
                                        <label for="member">Programmer:</label>
                                        <div class="form-group">
                                            <select class="form-control selectric" multiple="" name="member[]" id="member">
                                                <option value="<?php echo $data->member ?>"><?php echo $data->member ?></option>
                                                <?php
                                                foreach ($user as $row) : ?>
                                                    <option value="<?php echo $row->firstname; ?>"><?php echo $row->firstname; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="offset-sm-9 col-sm-10">
                                            <button type="submit" name="action" class="btn btn-primary">save</button> &nbsp;
                                            <a href="<?php echo base_url('Team_ctrl/dataTeam') ?>"><button type="button" class="btn btn-default center-block">Cancel</button></a>
                                        </div>
                                    </form>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>
