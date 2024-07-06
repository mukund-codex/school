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
                                            <th scope="col">Id</th>
                                            <th scope="col">Profile Picture</th>
                                            <th scope="col">Teacher Name</th>
                                            <th scope="col">Attendance Date</th>
                                            <th scope="col">Attendance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($attendance as $attend)
                                            <tr>
                                                <td>{{ $i }}</td>

                                                <td><img src="{{ asset($attend['profile_picture']) }}" height="100" width="auto" alt="Not Uploaded"></td>
                                                <td> {{ $attend['first_name'] }} {{ $attend['last_name'] }} </td>
                                                <td>{{ date('d-m-Y') }}</td>
                                                <td style="font-weight: bolder">{{ !empty($attend['teacher_attendance']) ? strtoupper($attend['teacher_attendance'][0]['status']) : NULL }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <form method="POST" action="{{ route('teachers.attendance.update') }}">
                                                                @csrf
                                                                <input type="hidden" name="teacher_id" id="teacher_id" value="{{ $attend['id'] }}">
                                                                <input type="hidden" name="attendance" id="attendance" value="absent">
                                                                <input type="hidden" name="attendance_id" id="attendance_id" value="{{ !empty ($attend['attendance']) ? $attend['teacher_attendance'][0]['id'] : "" }}">
                                                                <input type="hidden" name="attendance_date" id="attendance_date" value="{{ date('Y-m-d') }}"/>
                                                                <button type="submit" class="btn btn-danger btn-rounded dark btn-sm">
                                                                    <i class="las la-trash-alt"></i>Absent
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <form method="POST" action="{{ route('teachers.attendance.update') }}">
                                                                @csrf
                                                                <input type="hidden" name="teacher_id" id="teacher_id" value="{{ $attend['id'] }}">
                                                                <input type="hidden" name="attendance" id="attendance" value="present">
                                                                <input type="hidden" name="attendance_id" id="attendance_id" value="{{ !empty ($attend['teacher_attendance']) ? $attend['teacher_attendance'][0]['id'] : "" }}">
                                                                <input type="hidden" name="attendance_date" id="attendance_date" value="{{ date('Y-m-d') }}"/>
                                                                <button type="submit" class="btn btn-success btn-rounded dark btn-sm">
                                                                    <i class="las la-trash-alt"></i>Present
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
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
