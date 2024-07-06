<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{ route('dashboard') }}"><img src="{{ asset('temps/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="has-arrow" href="{{ route('dashboard') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        @if(session()->get('role') == 'admin')
        <li class>
            <a class="has-arrow" href="{{ route('teacher.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Teacher</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="{{ route('classes.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Classes</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="{{ route('students.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Students</span>
            </a>
        </li>
        @endif
        <li class>
            <a class="has-arrow" href="{{ route('students.class.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Student-Class Allotment</span>
            </a>
        </li>
        @if(session()->get('role') == 'admin')
        <li class>
            <a class="has-arrow" href="{{ route('teachers.attendance') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Teacher Attendance Report</span>
            </a>
        </li>
        @endif
        <li class>
            <a class="has-arrow" href="{{ route('students.attendance') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Student Attendance Report</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="{{ route('schedules.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Class Schedule</span>
            </a>
        </li>

        @if(session()->get('role') == 'admin')
        <li class>
            <a class="has-arrow" href="{{ route('subjects.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Subjects</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="{{ route('teacher.subject.mapping') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Map Subjects to Teacher</span>
            </a>
        </li>
        @endif

        <li class>
            <a class="has-arrow" href="{{ route('leaves.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Leaves</span>
            </a>
        </li>
    </ul>
</nav>
