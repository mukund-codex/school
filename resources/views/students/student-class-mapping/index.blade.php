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
                                            <a href="{{ route('students.class.add') }}" data-bs-toggle="modal" data-bs-target="#addcategory"
                                               class="btn_1">Map Students to Class/Divisions</a>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mapping as $map)
                                            <tr>
                                                <td> {{ $map['roll_no'] }} </td>
                                                <td>{{ $map['student']['first_name'] . ' ' . $map['student']['last_name']}}</td>
                                                <td>{{ $map['class']['name'] }}</td>
                                                <td>{{ $map['division']['name'] }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('students.class.delete', ['id' => $map['id']]) }}">
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
