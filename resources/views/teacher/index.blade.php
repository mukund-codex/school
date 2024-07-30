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
                                            <a href="{{ route('teacher.add') }}" data-bs-toggle="modal" data-bs-target="#addcategory"
                                               class="btn_1">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Profile Picture</th>
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
                                        @foreach($teachers as $teacher)
                                        <tr>
                                            <td>
                                                @if($teacher['profile_picture'])
                                                    <img src="{{ asset($teacher['profile_picture']) }}" height="100" width="auto" alt="Not Uploaded">
                                                @else
                                                    <span>NO PROFILE PICTURE</span>
                                                @endif
                                            </td>
                                            <td>{{ $teacher['first_name'] }}</td>
                                            <td>{{ $teacher['last_name'] }}</td>
                                            <td>{{ $teacher['email'] }}</td>
                                            <td>{{ $teacher['mobile'] }}</td>
                                            <td>{{ ucfirst($teacher['gender']) }}</td>
                                            <td>{{ $teacher['dob'] }}</td>
                                            <td>
                                                @if($teacher['status'])
                                                    <a href="{{ route('teacher.status', ['id' => $teacher['id']]) }}" class="status_btn">Active</a>
                                                @endif

                                                @if(! $teacher['status'])
                                                    <a href="{{ route('teacher.status', ['id' => $teacher['id']]) }}" class="status_btn">Inactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('teacher.edit', ['id' => $teacher['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                                    <i class="las la-edit">Edit</i>
                                                </a>
                                                <form method="POST" action="{{ route('teacher.delete', ['id' => $teacher['id']]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-rounded dark btn-sm">
                                                        <i class="las la-trash-alt"></i>Delete
                                                    </button>
{{--                                                    <button class="btn btn-danger float-right" type="submit" name="delete">Delete</button>--}}
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(itemId) {
            var form = document.getElementById('deleteForm');
            form.action = '/items/' + itemId;
            $('#deleteModal').modal('show');
        }
    </script>
    @include('common.footer')
</section>

</body>

</html>
