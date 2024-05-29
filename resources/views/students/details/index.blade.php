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
                                        @if(count($details) == 0)
                                            <div class="add_button ms-2">
                                                <a href="{{ route('students.details.add', ['id' => request()->route()->parameter('id')]) }}" data-bs-toggle="modal" data-bs-target="#addcategory"
                                                   class="btn_1">Add Student Details</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Student Id</th>
                                            <th scope="col">1st Reference Name</th>
                                            <th scope="col">1st Reference Contact</th>
                                            <th scope="col">1st Reference Relation</th>
                                            <th scope="col">2nd Reference Name</th>
                                            <th scope="col">2nd Reference Contact</th>
                                            <th scope="col">2nd Reference Relation</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($details as $detail)
                                            <tr>
                                                <td>{{ $detail['student_id'] }}</td>
                                                <td>{{ $detail['name_1'] }}</td>
                                                <td>{{ $detail['contact_1'] }}</td>
                                                <td>{{ $detail['relation_1'] }}</td>
                                                <td>{{ $detail['name_2'] }}</td>
                                                <td>{{ $detail['contact_2'] }}</td>
                                                <td>{{ $detail['relation_2'] }}</td>
                                                <td>
                                                    <a href="{{ route('students.details.edit', ['id' => $detail['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                                        <i class="las la-edit">Edit</i>
                                                    </a>
                                                    <form method="POST" action="{{ route('students.details.delete', ['id' => $detail['id']]) }}">
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
    @include('common.footer')
</section>

</body>

</html>
