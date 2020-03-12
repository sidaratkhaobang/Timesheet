<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?> Emp_ctrl/select_data">Timesheet</a>
        </div> 
        <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href=""><i class="fas fa-fire"></i><span>Dashboard Task</span></a></li>
        </li>
        <li class="menu-header">Task</li>
            <li class="<?php echo $this->uri->segment(2) == 'status' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Emp_ctrl/select_data"><i class="far fa-file-alt"></i> <span>Time Task</span></a></li>
        </li>
        </ul>
        <!-- <div class="mt-2 mb-18 p-3 hide-sidebar-mini">
            <a href=# class="btn btn-primary btn-lg  btn-block btn-icon-split">
                
            </a>
        </div> -->
    </aside>
</div>