<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_L');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Project</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('Leader_ctrl/dashboard'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Project</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-10">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Project</h4>
                        </div>
                        <div class="card-body">
                            <span><?php echo $countAll; ?></span>
                        </div>
                        <a href="<?php echo base_url('Leader_ctrl/status'); ?>" class="card-cta">View Detail <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Approve</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $countA->status; ?>
                        </div>
                        <a href="<?php echo base_url('Leader_ctrl/status_approve'); ?>" class="card-cta">View Detail <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Waiting</h4>
                        </div>
                        <div class="card-body">
                            <span><?php echo $countW->status; ?>
                        </div>
                        <a href="<?php echo base_url('Leader_ctrl/status_wait'); ?>" class="card-cta">View Detail <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Decline</h4>
                        </div>
                        <div class="card-body">
                            <span><?php echo $countD->status; ?>
                        </div>
                        <a href="<?php echo base_url('Leader_ctrl/status_decl'); ?>" class="card-cta">View Detail <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Budget</h4>
                        </div>
                        <div class="card-body">
                            <span><?php echo number_format($sumAll); ?> THB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card gradient-bottom">
                <div class="card-header">
                    <h4>Progress Project All</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <?php if ($getName->num_rows() > 0) {
                            foreach ($getName->result() as $row) {
                                // foreach ($getBudget->result() as $to) { 
                        ?>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="<?php echo base_url(); ?>assets/img/products/product-4-50.png" alt="product">
                                    <div class="media-body">
                                        <div class="media-title"><span><?php echo $row->project_name ?></span></div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="<?php echo $row->score_type; ?>%"></div>
                                                <div class="budget-price-label"><?php echo $row->score_type; ?>%</div>
                                            </div>

                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width=""></div>
                                                <div class="budget-price-label"><span><?php echo number_format($row->budget); ?>$</span></div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                        <?php  }
                            // }
                        } ?>
                    </ul>
                </div>
                <div class="card-footer  d-flex justify-content-center">
                    <div class="budget-price justify-content-center">
                        <div class="budget-price-square bg-primary" data-width="20"></div>
                        <div class="budget-price-label">Progress</div>
                    </div>
                    <div class="budget-price justify-content-center">
                        <div class="budget-price-square bg-danger" data-width="20"></div>
                        <div class="budget-price-label">Budget Price</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>