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
                                            <a href="{{ route('teacher.experiences.add', ['id' => request()->route()->parameter('id')]) }}" data-bs-toggle="modal" data-bs-target="#addcategory"
                                               class="btn_1">Add Teacher Experience</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Teacher Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Employment Type</th>
                                            <th scope="col">Company Name</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Location Type</th>
                                            <th scope="col">Start Month</th>
                                            <th scope="col">Start Year</th>
                                            <th scope="col">End Month</th>
                                            <th scope="col">End Year</th>
                                            <th scope="col">Currently Working</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($experiences as $exp)
                                            <tr>
                                                <td>{{ $exp['teacher_id'] }}</td>
                                                <td>{{ $exp['title'] }}</td>
                                                <td>{{ ucfirst($exp['employment_type']) }}</td>
                                                <td>{{ $exp['company_name'] }}</td>
                                                <td>{{ $exp['location'] }}</td>
                                                <td>{{ ucfirst($exp['location_type']) }}</td>
                                                <td>{{ config('constants.MONTHS')[$exp['start_month']] }}</td>
                                                <td>{{ $exp['start_year'] }}</td>
                                                <td>{{ (!empty($exp['end_month'])) ? config('constants.MONTHS')[$exp['end_month']] : ''}}</td>
                                                <td>{{ $exp['end_year'] }}</td>
                                                <td>{{ ($exp['current'] == 1) ? "Yes" : "No" }}</td>
                                                <td>{{ $exp['description'] }}</td>
                                                <td>
                                                    <a href="{{ route('teacher.experiences.edit', ['id' => $exp['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                                        <i class="las la-edit">Edit</i>
                                                    </a>

                                                    <form method="POST" action="{{ route('teacher.experiences.delete', ['id' => $exp['id']]) }}">
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
