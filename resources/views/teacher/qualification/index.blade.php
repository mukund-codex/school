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
                                        <div class="add_button ms-2">
                                            <a href="{{ route('teacher.qualifications.add', ['id' => request()->route()->parameter('id')]) }}" data-bs-toggle="modal" data-bs-target="#addcategory"
                                               class="btn_1">Add Teacher Qualifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Teacher Id</th>
                                            <th scope="col">School/Institute</th>
                                            <th scope="col">Degree</th>
                                            <th scope="col">Study</th>
                                            <th scope="col">Start Month</th>
                                            <th scope="col">Start Year</th>
                                            <th scope="col">End Month</th>
                                            <th scope="col">End Year</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($qualifications as $qualification)
                                            <tr>
                                                <td>{{ $qualification['teacher_id'] }}</td>
                                                <td>{{ $qualification['school'] }}</td>
                                                <td>{{ $qualification['degree'] }}</td>
                                                <td>{{ $qualification['study'] }}</td>
                                                <td>{{ config('constants.MONTHS')[$qualification['start_month']] }}</td>
                                                <td>{{ $qualification['start_year'] }}</td>
                                                <td>{{ config('constants.MONTHS')[$qualification['end_month']] }}</td>
                                                <td>{{ $qualification['end_year'] }}</td>
                                                <td>{{ $qualification['grade'] }}</td>
                                                <td>{{ $qualification['description'] }}</td>
                                                <td>
                                                    <a href="{{ route('teacher.qualifications.edit', ['id' => $qualification['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                                        <i class="las la-edit">Edit</i>
                                                    </a>

                                                    <form method="POST" action="{{ route('teacher.qualifications.delete', ['id' => $qualification['id']]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-rounded dark btn-sm">
                                                            <i class="las la-trash-alt"></i>Delete
                                                        </button>
                                                    </form>
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
</section>

</body>

</html>
