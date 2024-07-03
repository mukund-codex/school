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
                                            <a href="{{ route('students.add') }}" data-bs-toggle="modal" data-bs-target="#addcategory"
                                               class="btn_1">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Profile Picture</th>
                                            <th scope="col">Enrollment No.</th>
                                            <th scope="col">Enrollment Date</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Date of Birth</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $stud)
                                            <tr>
                                                <td><img src="{{ asset($stud['profile_picture']) }}" height="100" width="auto" alt="Not Uploaded"></td>
                                                <td> {{ $stud['studentEnrollment']['enrollment_number'] }} </td>
                                                <td> {{ $stud['created_at']->format('d-m-Y') }} </td>
                                                <td>{{ $stud['first_name'] }}</td>
                                                <td>{{ $stud['last_name'] }}</td>
                                                <td>{{ $stud['email'] }}</td>
                                                <td>{{ $stud['mobile'] }}</td>
                                                <td>{{ ucfirst($stud['gender']) }}</td>
                                                <td>{{ $stud['dob'] }}</td>
                                                <td>
                                                    @if($stud['status'])
                                                        <a href="{{ route('students.status', ['id' => $stud['id']]) }}" class="status_btn">Active</a>
                                                    @endif

                                                    @if(! $stud['status'])
                                                        <a href="{{ route('students.status', ['id' => $stud['id']]) }}" class="status_btn">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('students.edit', ['id' => $stud['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                                        <i class="las la-edit">Edit</i>
                                                    </a>

                                                    <form method="POST" action="{{ route('students.delete', ['id' => $stud['id']]) }}">
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
