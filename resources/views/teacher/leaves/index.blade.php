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
                                            @if(session()->get('role') != 'admin')
                                            <a href="{{ route('leaves.add') }}" data-bs-toggle="modal" data-bs-target="#addcategory"
                                               class="btn_1">Request for Leave</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">From Date</th>
                                            <th scope="col">To Date</th>
                                            <th scope="col">Reason</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Comments</th>
                                            <th scope="col">Approved By</th>
                                            <th scope="col">Rejected By</th>
                                            <th scope="col">Cancelled By</th>
                                            @if(session()->get('role') == 'admin')
                                                <th scope="col">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leaves as $lev)
                                            <tr>
                                                <td>{{ $lev['id'] }} </td>
                                                <td>{{ ucfirst($lev['type']) }}</td>
                                                <td>{{ $lev['start_date'] }}</td>
                                                <td>{{ $lev['end_date'] }}</td>
                                                <td>{{ $lev['reason'] }}</td>
                                                <td>{{ ucfirst($lev['status']) }}</td>
                                                <td>{{ $lev['comment'] }}</td>
                                                <td>{{ $lev['approvedBy']['first_name'] }} {{ $lev['approvedBy']['last_name'] }}</td>
                                                <td>{{ ($lev['rejectedBy']) ? $lev['rejectedBy']['first_name'].' '.$lev['approvedBy']['last_name'] : '' }} </td>
                                                <td>{{ $lev['canceled_by'] }}</td>
                                                @if($lev['status'] == 'pending' && session()->get('role') == 'teacher')
                                                    <td>
                                                        <a href="{{ route('leaves.edit', ['id' => $lev['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                                            <i class="las la-edit">Edit</i>
                                                        </a>
                                                        <form method="POST" action="{{ route('leaves.delete', ['id' => $lev['id']]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-rounded dark btn-sm">
                                                                <i class="las la-trash-alt"></i>Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif
                                                @if(session()->get('role') == 'admin')
                                                    <td>
                                                        @if($lev['status'] != 'approved')
                                                            <form method="POST" action="{{ route('leaves.status', ['id' => $lev['id']]) }}">
                                                                @csrf
                                                                <input type="hidden" class="form-control" name="status" id="status" value="approved">
                                                                <button type="submit" class="btn btn-success btn-rounded dark btn-sm">
                                                                    <i class="las la-check"></i>Approve
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if($lev['status'] != 'rejected')
                                                            <form method="POST" action="{{ route('leaves.status', ['id' => $lev['id']]) }}">
                                                                @csrf
                                                                <input type="hidden" class="form-control" name="status" id="status" value="rejected">
                                                                <button type="submit" class="btn btn-success btn-rounded dark btn-sm">
                                                                    <i class="las la-check"></i>Reject
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12"></div>
            </div>
        </div>
    </div>
    @include('common.footer')
</section>

</body>

</html>
