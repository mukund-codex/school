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
                                            <a href="{{ route('schedules.add') }}" data-bs-toggle="modal" data-bs-target="#addcategory"
                                               class="btn_1">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Teacher Name</th>
                                            <th scope="col">Class Name</th>
                                            <th scope="col">Division Name</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Subject Code</th>
                                            <th scope="col">Start Time</th>
                                            <th scope="col">End Time</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($schedules as $sch)
                                            @php
                                                $i = 1;
                                            @endphp
                                            <tr>
                                                <td> @php echo $i; @endphp</td>
                                                <td>{{ $sch['teacher']['first_name'] }}</td>
                                                <td>{{ $sch['class']['name'] }}</td>
                                                <td>{{ $sch['division']['name'] }}</td>
                                                <td>{{ $sch['subject']['name'] }}</td>
                                                <td>{{ $sch['subject']['code'] }}</td>
                                                <td>
                                                    @if($sch['status'])
                                                        <a href="#" class="status_btn">Active</a>
                                                    @endif

                                                    @if(! $sch['status'])
                                                        <a href="#" class="status_btn">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('subjects.edit', ['id' => $sch['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                                        <i class="las la-edit">Edit</i>
                                                    </a>

                                                    <form method="GET" action="{{ route('subjects.delete', ['id' => $sch['id']]) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-rounded dark btn-sm">
                                                            <i class="las la-trash-alt"></i>Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
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
