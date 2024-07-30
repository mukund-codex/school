<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{ route('dashboard') }}"><img src="{{ asset('temps/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="" href="{{ route('dashboard') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="true">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/2.svg') }}" alt="">
                </div>
                <span>Class & Division</span>
            </a>
            <ul class="mm-collapse">
                <li><a href="{{ route('classes.list') }}">Classes</a></li>
                <li><a href="{{ route('divisions.list') }}">Divisions</a></li>
            </ul>
        </li>
        <li class>
            <a class="" href="{{ route('subjects.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Subjects</span>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="true">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/2.svg') }}" alt="">
                </div>
                <span>Teacher Module</span>
            </a>
            <ul class="mm-collapse">
                <li><a href="{{ route('teacher.list') }}">Teachers</a></li>
                <li><a href="{{ route('teacher.subject.mapping') }}">Subjects</a></li>
                <li><a href="{{ route('schedules.list') }}">Class Schedule</a></li>
                <li><a href="{{ route('teachers.attendance') }}">Attendance</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="true">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/2.svg') }}" alt="">
                </div>
                <span>Student Module</span>
            </a>
            <ul class="mm-collapse">
                <li><a href="{{ route('students.list') }}">Students</a></li>
                <li><a href="{{ route('students.class.list') }}">Classes</a></li>
                <li><a href="{{ route('students.attendance') }}">Attendance</a></li>
            </ul>
        </li>
        @if(session()->get('role') == 'admin')
        @endif

        @if(session()->get('role') == 'admin')

        @endif

        @if(session()->get('role') == 'admin')
        @endif

        <li class>
            <a class="" href="{{ route('leaves.list') }}">
                <div class="icon_menu">
                    <img src="{{ asset('temps/img/menu-icon/4.svg') }}" alt="">
                </div>
                <span>Leaves</span>
            </a>
        </li>
    </ul>
</nav>
