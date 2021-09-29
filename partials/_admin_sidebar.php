<?php 

if(isset($_SESSION["userdata"])){
  $user = $_SESSION["userdata"];
  $cs_no = $user->username;
  $role = $user->role;
  $fullname = $user->fullname;
  $sex = $user->sex;
  $email = $user->email;
  $phone = $user->phone;
  $status = $user->status;
}

?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="dist/img/csdc_logo.png" alt="CSDC Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CS Data Capture</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="saved_images/<?php echo $cs_no  ?>.jpg" class="img-circle elevation-2"  alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $fullname ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/csdcapp" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Operations</li>
          <li class="nav-item">
            <a href="/csdcapp/staff_list.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Staff List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="new_staff.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                New Staff Record
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="mda_list.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                MDA List
              </p>
            </a>
          </li>

          <!-- <li class="nav-header">Reports</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Generate Nomimal Roll
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
               Generate Disposition List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
               Generate Retirement List
              </p>
            </a>
          </li> -->

          <li class="nav-header">User Settings</li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                User Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
              Password Reset
              </p>
            </a>
          </li>

          <li class="nav-header">Admin Operation</li>
          <li class="nav-item">
            <a href="/csdcapp/system_users.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
              System Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
              Users Audit Trail
              </p>
            </a>
          </li>
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>