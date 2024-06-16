<!DOCTYPE html>
<html lang="en">

@include('common.header')
<style>
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
            <form method="post" action="{{ route('schedules.create') }}">
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
                                            @foreach($teachers as $teach)
                                                <option value="{{ $teach->id }}" @if($teach->id == $schedule->teacher_id) selected @endif >{{ $teach->first_name }} {{ $teach->last_name }}</option>
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
                                        <h3 class="m-0">Class</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select class="form-control" name="class_id" id="classes_id">
                                            <option>Select Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}" @if($class->id == $schedule->class_id) selected @endif >{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
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
                                        <h3 class="m-0">Division</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select class="form-control" name="division_id" id="division_id"></select>
                                        @error('division_id')
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
                                            @foreach($subjects as $sub)
                                                <option value="{{ $sub->id }}" @if($sub->id == $schedule->subject_id) selected @endif >{{ $sub->name }}</option>
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
                                        <h3 class="m-0">Start Time</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="time" id="start_time" name="start_time" class="form-control" min="07:00" max="18:00" required value="{{ $schedule->start_time }}">
                                        @error('start_time')
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
                                        <h3 class="m-0">End Time</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="time" id="end_time" name="end_time" class="form-control" min="07:00" max="18:00" required value="{{ $schedule->end_time }}">
                                        @error('end_time')
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
                                        <h3 class="m-0">Date</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="date" id="date" class="form-control" name="date"  value="{{ $schedule->date }}">
                                        @error('date')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-block" style="width: 100%;">Add Details</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('common.footer')

</section>
<script>
    $(document).ready(function(){
        $('#classes_id').on('change', function(){
            var class_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route("students.divisions.list") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': class_id
                },
                success: function(data) {
                    $('#division_id').empty();
                    $('#division_id').append('<option>Select Division</option>');
                    $.each(data, function(index, division) {
                        $('#division_id').append('<option value="'+division.id+'">'+division.name+'</option>');
                    });
                }
            });
        });
    });
</script>

<script>
    document.getElementById('start_time').addEventListener('input', function() {
        const timeInput = this;
        const errorMessage = document.getElementById('error-message');
        const minTime = "07:00";
        const maxTime = "18:00";

        if (timeInput.value < minTime || timeInput.value > maxTime) {
            errorMessage.textContent = `Please choose a time between ${minTime} and ${maxTime}.`;
            timeInput.setCustomValidity('Invalid time');
        } else {
            errorMessage.textContent = '';
            timeInput.setCustomValidity('');
        }
    });
</script>

<script>
    document.getElementById('end_time').addEventListener('input', function() {
        const timeInput = this;
        const errorMessage = document.getElementById('error-message');
        const minTime = "07:00";
        const maxTime = "18:00";

        if (timeInput.value < minTime || timeInput.value > maxTime) {
            errorMessage.textContent = `Please choose a time between ${minTime} and ${maxTime}.`;
            timeInput.setCustomValidity('Invalid time');
        } else {
            errorMessage.textContent = '';
            timeInput.setCustomValidity('');
        }
    });
</script>

</body>

</html>
