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
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Project</div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-6 mt-lg-0 mt-sm-4">
            <div class="card">
                <div class="card-header">
                    <h4>Referral URL</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart3" height="50"></canvas>
                    <div class="mb-4 mt-4">
                        <div class="text-small float-right font-weight-bold text-muted">558</div>
                        <div class="font-weight-bold mb-1">Google</div>
                        <div class="progress" data-height="3">
                            <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="text-small float-right font-weight-bold text-muted">338</div>
                        <div class="font-weight-bold mb-1">Facebook</div>
                        <div class="progress" data-height="3">
                            <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>