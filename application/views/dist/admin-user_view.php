<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('team_ctrl/dataTeam'); ?>">Team</a></div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User</h4>&nbsp;&nbsp;
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <div class="buttons">
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search..." name="search" id="search" value="<?php if ($this->input->get('search')) echo $this->input->get('search'); ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Firstname</th>
                                        <th scope="col">Lastname</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                if (!empty($data_user)) {
                                    $no = 1;
                                    foreach ($data_user->result() as $data) { ?>
                                        <tr>
                                            <td><?php echo $data->idUser; ?></td>
                                            <td><?php echo $data->firstname; ?></td>
                                            <td><?php echo $data->lastname; ?></td>
                                            <td><?php echo $data->role; ?></td>
                                            <td><?php echo $data->email; ?></td>
                                            <td><?php echo $data->phone; ?></td>
                                            <td><?php echo $data->level; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="far fa-edit"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a href="<?php echo base_url('user_ctrl/change_admin/' . $data->idUser) ?>" class="dropdown-item has-icon text-danger" onclick="return confirm('Confirm Level?');">Admin</a>
                                                        <a href="<?php echo base_url('user_ctrl/change_leader/' . $data->idUser) ?>" class="dropdown-item has-icon text-primary" onclick="return confirm('Confirm Level?');">Leader</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <?php echo $pagination; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>