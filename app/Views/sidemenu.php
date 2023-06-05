

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="userlist">
              <i class="bi bi-circle"></i><span>Admin List</span>
            </a>
          </li> 
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>instructor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="instructor">
              <i class="bi bi-circle"></i><span>Instructor Manage</span>
            </a>
          </li> 
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-stu" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-stu" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="student">
              <i class="bi bi-circle"></i><span>Students Manage</span>
            </a>
          </li> 
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-quz" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Quiz</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-quz" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="student">
              <i class="bi bi-circle"></i><span>Quiz 1</span>
            </a>
          </li> 
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"   href="<?php echo base_url() ?>logout">
          <i class="bi bi-box-arrow-in-right"></i><span>Log Out</span></i>
        </a>
        
      </li><!-- End Components Nav -->
       
   
    </ul>

  </aside><!-- End Sidebar-->