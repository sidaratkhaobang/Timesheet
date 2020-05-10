<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index_0">Timesheet Admin</a>
          </div>

          <ul class="sidebar-menu">
            <li class="menu-header">Project</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'project' || $this->uri->segment(2) == 'create_project' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>  <span>Project</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $this->uri->segment(2) == 'project' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>project_ctrl/project">All Project</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'create_project' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>project_ctrl/create_project">Create Project</a></li>
              </ul>
            </li>
            <li class="menu-header">Team management</li>
            <li class="<?php echo $this->uri->segment(2) == 'team' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>team_ctrl/team"><i class="far fa-user"></i> <span>Team</span></a></li>
           
          </ul>
          
        </aside>
      </div>