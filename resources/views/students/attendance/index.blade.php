<!DOCTYPE html>
<html lang="en">

@include('common.header')

<body>

@include('common.sidebar')

<section class="main_content dashboard_part large_header_bg">
    @include('common.search')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Data table</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Table</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Roll No.</th>
                                            <th scope="col">Student Name</th>
                                            <th scope="col">Class Name</th>
                                            <th scope="col">Division Name</th>
                                            <th scope="col">Attendance Date</th>
                                            <th scope="col">Attendance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($attendance as $attend)
                                            <tr>
                                                <td>{{ $attend['roll_no'] }}</td>
                                                <td> {{ $attend['student']['first_name'] }} {{ $attend['student']['last_name'] }} </td>
                                                <td>{{ $attend['class']['name'] }}</td>
                                                <td>{{ $attend['division']['name'] }}</td>
                                                <td>{{ date('d-m-Y') }}</td>
                                                <td>{{ !empty($attend['attendance']) ? ucfirst($attend['attendance']['status']) : NULL }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <form method="POST" action="{{ route('students.attendance.update') }}">
                                                                @csrf
                                                                <input type="hidden" name="student_id" id="student_id" value="{{ $attend['student']['id'] }}">
                                                                <input type="hidden" name="class_id" id="class_id" value="{{ $attend['class']['id'] }}">
                                                                <input type="hidden" name="division_id" id="division_id" value="{{ $attend['division']['id'] }}">
                                                                <input type="hidden" name="attendance" id="attendance" value="absent">
                                                                <input type="hidden" name="attendance_id" id="attendance_id" value="{{ !empty ($attend['attendance']) ? $attend['attendance']['id'] : "" }}">
                                                                <input type="hidden" name="attendance_date" id="attendance_date" value="{{ date('Y-m-d') }}"/>
                                                                <button type="submit" class="btn btn-danger btn-rounded dark btn-sm">
                                                                    <i class="las la-trash-alt"></i>Absent
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <form method="POST" action="{{ route('students.attendance.update') }}">
                                                                @csrf
                                                                <input type="hidden" name="student_id" id="student_id" value="{{ $attend['student']['id'] }}">
                                                                <input type="hidden" name="class_id" id="class_id" value="{{ $attend['class']['id'] }}">
                                                                <input type="hidden" name="division_id" id="division_id" value="{{ $attend['division']['id'] }}">
                                                                <input type="hidden" name="attendance" id="attendance" value="present">
                                                                <input type="hidden" name="attendance_id" id="attendance_id" value="{{ !empty ($attend['attendance']) ? $attend['attendance']['id'] : "" }}">
                                                                <input type="hidden" name="attendance_date" id="attendance_date" value="{{ date('Y-m-d') }}"/>
                                                                <button type="submit" class="btn btn-success btn-rounded dark btn-sm">
                                                                    <i class="las la-trash-alt"></i>Present
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
    @include('common.footer')
</section>

</body>

</html>
