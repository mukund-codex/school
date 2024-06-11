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
            <form method="post" action="{{ route('teacher.subject.mapping.create') }}">
                @csrf
                @include('common.form-alert')
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Teacher</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select class="form-control" name="teacher_id" id="teacher_id">
                                            <option>Select Teacher</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher_id')
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
                                        <h3 class="m-0">Subject</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select class="form-control" name="subject_id" id="subject_id">
                                            <option>Select Subject</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subject_id')
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
                                        <h3 class="m-0">Experience (in Years)</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="text" class="form-control" name="experience" id="experience" placeholder="Experience (in Years)">
                                        @error('subject_id')
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
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-block" style="width: 100%;">Add Mapping</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</body>

</html>
