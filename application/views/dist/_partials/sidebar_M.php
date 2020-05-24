<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>Emp_ctrl/task_emp">Timesheet</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php echo $this->uri->segment(2) == 'emp_dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Emp_ctrl/emp_dashboard"><i class="fas fa-fire"></i><span>Dashboard Tracker</span></a></li>

            <li class="menu-header">Task</li>
            <li class="<?php echo $this->uri->segment(2) == 'task_emp' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Emp_ctrl/task_emp"><i class="far fa-file-alt"></i> <span>Time Task</span></a></li>


            <li class="menu-header">Your assignments</li>
            <li class="<?php echo $this->uri->segment(2) == 'emp_noti' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Emp_ctrl/emp_noti"><i class="far fa-file-alt"></i> <span>Assignments</span></a></li>
            <!-- <li class="<?php echo $this->uri->segment(2) == 'emp_noti' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Emp_ctrl/chart"><i class="far fa-file-alt"></i> <span>test</span></a></li> -->


        </ul>
    </aside>
</div>