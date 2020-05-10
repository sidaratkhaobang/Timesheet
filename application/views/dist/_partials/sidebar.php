<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dist/index_0">Timesheet Admin</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Project</li>
      <li class="<?php echo $this->uri->segment(2) == 'project' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>project_ctrl/project">All Project</a></li>
      <li class="menu-header">Team management</li>
      <li class="<?php echo $this->uri->segment(2) == 'dataTeam' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>team_ctrl/dataTeam"><i class="far fa-user"></i> <span>Team</span></a></li>
    </ul>
  </aside>
</div>