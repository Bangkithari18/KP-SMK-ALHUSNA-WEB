<!-- views/layout/sidebar.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="dashboard.php" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-widget="treeview" aria-expanded="false">
                <!-- Master Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="master.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu Master</p>
                            </a>
                        </li>
                        <!-- Sub-menu for Master -->
                        <li class="nav-item">
                            <a href="submenu.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Menu Master</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Other menu items -->
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>