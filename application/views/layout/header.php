<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>เเจ้งเตือนอุณหภูมิ</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>เเจ้งเตือนอุณหภูมิ</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">ชื่อ : <?php //echo $username; ?></span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url(); ?>Logout" class="btn btn-danger "><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                </li>
            </ul>
        </div>

    </nav>
</header>