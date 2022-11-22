<!-- BEGIN: Main Menu-->
<?php include('connection.php') ?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><span class="brand-logo">

              <h2 class="brand-text">Examination System</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo $url; ?>class.php"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Email">Classes</span></a>
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo $url; ?>subject.php"><i data-feather="box"></i><span class="menu-title text-truncate" data-i18n="Email">Subjects</span></a>
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo $url; ?>asign_subject.php"><i data-feather="credit-card"></i><span class="menu-title text-truncate" data-i18n="Email">Asign Subject</span></a>
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo $url; ?>student.php"><i data-feather="eye"></i><span class="menu-title text-truncate" data-i18n="Email">Student</span></a>
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo $url; ?>asign_student.php"><i data-feather="droplet"></i><span class="menu-title text-truncate" data-i18n="Email">Asign Student</span></a>
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo $url; ?>exam.php"><i data-feather="layout"></i><span class="menu-title text-truncate" data-i18n="Email">Exam</span></a>
          </li>

     

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo $url; ?>user.php"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Email">User</span></a>
          </li>

        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->