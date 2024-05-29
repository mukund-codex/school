<!DOCTYPE html>
<html lang="en">

@include('common.header')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<body>

@include('common.sidebar')
<section class="main_content dashboard_part large_header_bg">
    @include('common.search')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <form method="post" action="{{ route('teacher.experiences.update', ['id' => $experience['id']]) }}">
                @csrf
                @include('common.form-alert')
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Title</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $experience['title'] }}" required>
                                        @error('title')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Employment Type</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select name="employment_type" id="employment_type" class="form-control">
                                            <option>Select Employment Type</option>
                                            <option value="fulltime" @if($experience['employment_type'] == 'fulltime') selected @endif>Full Time</option>
                                            <option value="parttime" @if($experience['employment_type'] == 'parttime') selected @endif>Part Time</option>
                                            <option value="selfemployed" @if($experience['employment_type'] == 'selfemployed') selected @endif>Self Employed</option>
                                            <option value="freelance" @if($experience['employment_type'] == 'freelance') selected @endif>Freelance</option>
                                            <option value="internship" @if($experience['employment_type'] == 'internship') selected @endif>Internship</option>
                                            <option value="trainee" @if($experience['employment_type'] == 'trainee') selected @endif>Trainee</option>
                                        </select>
                                        @error('employment_type')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Company Name</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" value="{{ $experience['company_name'] }}" required>
                                        @error('company_name')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Location</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{ $experience['location'] }}" required>
                                        @error('location')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Location Type</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select class="form-control" name="location_type" id="location_type">
                                            <option>Select Location Type</option>
                                            <option value="onsite" @if($experience['location_type'] == 'onsite') selected @endif>On-Site</option>
                                            <option value="hybrid" @if($experience['location_type'] == 'hybrid') selected @endif>Hybrid</option>
                                            <option value="remote" @if($experience['location_type'] == 'remote') selected @endif>Remote</option>
                                        </select>
                                        @error('location_type')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Start Month</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select name="start_month" id="start_month" class="form-control">
                                            <option>Select Month</option>
                                            <option value="1" @if($experience['start_month'] == 1) selected @endif>January</option>
                                            <option value="2" @if($experience['start_month'] == 2) selected @endif>February</option>
                                            <option value="3" @if($experience['start_month'] == 3) selected @endif>March</option>
                                            <option value="4" @if($experience['start_month'] == 4) selected @endif>April</option>
                                            <option value="5" @if($experience['start_month'] == 5) selected @endif>May</option>
                                            <option value="6" @if($experience['start_month'] == 6) selected @endif>June</option>
                                            <option value="7" @if($experience['start_month'] == 7) selected @endif>July</option>
                                            <option value="8" @if($experience['start_month'] == 8) selected @endif>August</option>
                                            <option value="9" @if($experience['start_month'] == 9) selected @endif>September</option>
                                            <option value="10" @if($experience['start_month'] == 10) selected @endif>October</option>
                                            <option value="11" @if($experience['start_month'] == 11) selected @endif>November</option>
                                            <option value="12" @if($experience['start_month'] == 12) selected @endif>December</option>
                                        </select>
                                        @error('start_month')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Start Year</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select id="start_year" name="start_year" class="form-control">
                                            <option>Select Year</option>
                                            @php
                                                $currentYear = date("Y");  // Get the current year
                                                $endYear = 1924; // Set the start year
                                                for ($year = $currentYear; $year >= $endYear; $year--) {
                                                    $selected = '';
                                                    if ($experience['start_year'] == $year) {
                                                        $selected = 'selected';
                                                    }
                                            @endphp
                                            <option value="{{ $year }}" {{ $selected }}>{{ $year }}</option>
                                            @php
                                                }
                                            @endphp
                                        </select>
                                        @error('start_year')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">End Month</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select name="end_month" id="end_month" class="form-control">
                                            <option>Select Month</option>
                                            <option value="1" @if($experience['end_month'] == 1) selected @endif>January</option>
                                            <option value="2" @if($experience['end_month'] == 2) selected @endif>February</option>
                                            <option value="3" @if($experience['end_month'] == 3) selected @endif>March</option>
                                            <option value="4" @if($experience['end_month'] == 4) selected @endif>April</option>
                                            <option value="5" @if($experience['end_month'] == 5) selected @endif>May</option>
                                            <option value="6" @if($experience['end_month'] == 6) selected @endif>June</option>
                                            <option value="7" @if($experience['end_month'] == 7) selected @endif>July</option>
                                            <option value="8" @if($experience['end_month'] == 8) selected @endif>August</option>
                                            <option value="9" @if($experience['end_month'] == 9) selected @endif>September</option>
                                            <option value="10" @if($experience['end_month'] == 10) selected @endif>October</option>
                                            <option value="11" @if($experience['end_month'] == 11) selected @endif>November</option>
                                            <option value="12" @if($experience['end_month'] == 12) selected @endif>December</option>
                                        </select>
                                        @error('end_month')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">End/Expected Year</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select id="end_year" name="end_year" class="form-control">
                                            <option>Select Year</option>
                                            @php
                                                $currentYear = date("Y");  // Get the current year
                                                $newYear = (int)$currentYear + 10;
                                                $endYear = 1924; // Set the start year
                                                for ($year = $newYear; $year >= $endYear; $year--) {
                                                    $selected = '';
                                                    if ($experience['end_year'] == $year) {
                                                        $selected = 'selected';
                                                    }
                                            @endphp
                                            <option value="{{ $year }}" {{ $selected }}>{{ $year }}</option>
                                            @php
                                                }
                                            @endphp
                                        </select>
                                        @error('end_year')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Currently Working Here?</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select class="form-control" name="current" id="current">
                                            <option>Select Yes/No</option>
                                            <option value="1" @if($experience['current'] == 1) selected @endif>Yes</option>
                                            <option value="0" @if($experience['current'] == 0) selected @endif>No</option>
                                        </select>
                                        @error('current')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Description</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <textarea name="description" id="description" class="form-control">{{ $experience['description'] }}</textarea>
                                        @error('description')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <input type="hidden" name="teacher_id" id="teacher_id" value="{{ $experience['teacher_id'] }}">
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-block" style="width: 100%;">Update Experience</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</body>

</html>
