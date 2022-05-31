<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
        <img src="/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
                <a href="/logout" class="d-block">Logout</a>
                <p style="color: white; font-weight: bold" href="" class="d-block">{{auth()->user()->email}}</p>
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
{{--                @if(Auth::user()->role == \App\Enums\UserRole::Admin)--}}
                <a href="/dashboard" class="nav-link">
                    <i class="fa fa-dashboard"></i>
                    <p>Dashboard</p>
                </a>
{{--                @endif--}}

                <li class="nav-header">RECRUITMENT MANAGEMENT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Vacancy Name
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/vacancies/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Vacancy Name</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/vacancies" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vacancy List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            RECRUIT SKILLS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/skills/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Skill</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/skills" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Skill List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            RECRUIT
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/recruits/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Recruit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/recruits" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recruit List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Curriculum Vitae
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/cv/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New CV</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/cv" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CV List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">ACCOUNT MANAGEMENT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Department
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/departments/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/departments" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Account
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/users/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Account</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Account List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">REPORT</li>
                    <a href="{{ route('report') }}" class="nav-link">
                        <i class="nav-icon fas fa-street-view"></i>
                        <p>
                            View Report
                        </p>
                    </a>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
