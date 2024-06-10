
<!DOCTYPE html>
<html lang="zxx">

@include('common.header')

<body class="crm_body_bg">

@include('common.sidebar')

<section class="main_content dashboard_part large_header_bg">

    @include('common.search')

    <div class="main_content_iner ">
        <div class="main_content_iner ">
            <div class="container-fluid p-0 ">
                <div class="row ">
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
