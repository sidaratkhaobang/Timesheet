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
      <li class="<?php echo $this->uri->segment(2) == 'project' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>project_ctrl/project"><i class="far fa-file-alt"></i><span>All Project<span></a></li>
      </li>
      <li class="menu-header">Team management</li>
      <li class="<?php echo $this->uri->segment(2) == 'dataTeam' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>team_ctrl/dataTeam"><i class="fas fa-th"></i> <span>Team</span></a></li>
      </li>
      <li class="menu-header">All User</li>
      <li class="<?php echo $this->uri->segment(2) == 'user' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>user_ctrl/user"><i class="fas fa-pencil-ruler"></i><span>User</span></a></li>
      </li>
    </ul>
  </aside>
</div>