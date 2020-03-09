<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>leader_ctrl/status">Timesheet</a>
        </div> 
        <ul class="sidebar-menu">
            <li class="<?php echo $this->uri->segment(2) == 'status' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Leader_ctrl/status"><i class="far fa-file-alt"></i> <span>Project</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'components_wizard' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>dist/components_wizard">Wizard</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Leader_ctrl/dashboard"><i class="fas fa-fire"></i><span>Dashboard Project</span></a></li>
        </ul>
        <div class="mt-2 mb-18 p-3 hide-sidebar-mini">
            <a href=# class="btn btn-primary btn-lg  btn-block btn-icon-split">
                <i class="fas fa-user"></i> Leader
            </a>
        </div>
    </aside>
</div>