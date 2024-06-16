
<!DOCTYPE html>
<html lang="zxx">

@include('common.header')
<style>
    .widget-subheading {
        font-size: large;
    }
</style>
<body class="crm_body_bg">

@include('common.sidebar')

<section class="main_content dashboard_part large_header_bg">

    @include('common.search')

    <div class="main_content_iner ">
        <div class="main_content_iner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-primary"></div>
                                        <i class="ti-user text-primary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['total_teachers'] }}</div>
                                    <div class="widget-subheading">Total Teachers</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-primary"></div>
                                        <i class="ti-check-box text-primary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['present_teachers'] }}</div>
                                    <div class="widget-subheading">Total Present Teachers</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-danger"></div>
                                        <i class="ti-close text-secondary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['absent_teachers'] }}</div>
                                    <div class="widget-subheading">Total Absent Teacher</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-primary"></div>
                                        <i class="ti-user text-primary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['total_students'] }}</div>
                                    <div class="widget-subheading">Total Students</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-danger"></div>
                                        <i class="ti-check-box text-secondary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['present_students'] }}</div>
                                    <div class="widget-subheading">Total Present Students</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-danger"></div>
                                        <i class="ti-close text-secondary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['absent_students'] }}</div>
                                    <div class="widget-subheading">Total Absent Students</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-danger"></div>
                                        <i class="ti-user text-secondary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['male_students'] }}</div>
                                    <div class="widget-subheading">Total Male Students</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-danger"></div>
                                        <i class="ti-user text-secondary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['female_students'] }}</div>
                                    <div class="widget-subheading">Total Female Students</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card mb-3 widget-chart">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-danger"></div>
                                        <i class="ti-user text-secondary"></i>
                                    </div>
                                    <div class="widget-numbers">{{ $dashboard['total_subjects'] }}</div>
                                    <div class="widget-subheading">Total Subjects</div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-4">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('temps/vendors/calender_js/core/main.js') }}"></script>
<script src="{{ asset('temps/vendors/calender_js/interaction/main.js') }}"></script>
<script src="{{ asset('temps/vendors/calender_js/daygrid/main.js') }}"></script>
<script src="{{ asset('temps/vendors/calender_js/timegrid/main.js') }}"></script>
<script src="{{ asset('temps/vendors/calender_js/list/main.js') }}"></script>
<script src="{{ asset('temps/vendors/calender_js/activation.js') }}"></script>

</body>

</html>
