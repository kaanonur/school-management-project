@php
    $prefix = \Illuminate\Support\Facades\Request::route()->getPrefix();
    $route = \Illuminate\Support\Facades\Request::route()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                <li class="treeview {{ $prefix == '/users' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Manage User</span>
                        <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'user.view' ? 'active' : '' }}"><a href="{{ route('user.view') }}"><i class="ti-more"></i>View user</a></li>
                        <li class="{{ $route == 'user.create' ? 'active' : '' }}"><a href="{{ route('user.create') }}"><i class="ti-more"></i>Add User</a></li>
                    </ul>
                </li>
            @endif

            <li class="treeview {{ $prefix == '/profile' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'profile.view' ? 'active' : '' }}"><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/setups' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Setup Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'student.class.view' ? 'active' : '' }}"><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
                    <li class="{{ $route == 'student.year.view' ? 'active' : '' }}"><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
                    <li class="{{ $route == 'student.group.view' ? 'active' : '' }}"><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a></li>
                    <li class="{{ $route == 'student.shift.view' ? 'active' : '' }}"><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a></li>
                    <li class="{{ $route == 'fee.category.view' ? 'active' : '' }}"><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a></li>
                    <li class="{{ $route == 'fee.amount.view' ? 'active' : '' }}"><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a></li>
                    <li class="{{ $route == 'exam.type.view' ? 'active' : '' }}"><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>
                    <li class="{{ $route == 'school.subject.view' ? 'active' : '' }}"><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>School Subject</a></li>
                    <li class="{{ $route == 'assign.subject.view' ? 'active' : '' }}"><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>
                    <li class="{{ $route == 'designation.view' ? 'active' : '' }}"><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/students' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Student Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'student.registration.view' ? 'active' : '' }}"><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student Registration</a></li>
                    <li class="{{ $route == 'roll.generate.view' ? 'active' : '' }}"><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a></li>
                    <li class="{{ $route == 'registration.fee.view' ? 'active' : '' }}"><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration Fee</a></li>
                    <li class="{{ $route == 'monthly.fee.view' ? 'active' : '' }}"><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthly Fee</a></li>
                    <li class="{{ $route == 'exam.fee.view' ? 'active' : '' }}"><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Exam Fee</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/employees' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Employee Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'employee.registration.view' ? 'active' : '' }}"><a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Employee Registration</a></li>
                    <li class="{{ $route == 'employee.salary.view' ? 'active' : '' }}"><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
                    <li class="{{ $route == 'employee.leave.view' ? 'active' : '' }}"><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a></li>
                    <li class="{{ $route == 'employee.attendance.view' ? 'active' : '' }}"><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee Attendance</a></li>
                    <li class="{{ $route == 'employee.monthly.salary.view' ? 'active' : '' }}"><a href="{{ route('employee.monthly.salary.view') }}"><i class="ti-more"></i>Employee Monthly Salary</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/marks' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Marks Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'marks.entry.create' ? 'active' : '' }}"><a href="{{ route('marks.entry.create') }}"><i class="ti-more"></i>Marks Entry</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                </ul>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
