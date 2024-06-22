<!DOCTYPE html>
<html lang="en">

@include('common.header')

<body>

@include('common.sidebar')

<section class="main_content dashboard_part large_header_bg">
    @include('common.search')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @include('common.form-alert')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="white_card card_height_100 mb_30">
                                    <div class="white_card_header">
                                        <div class="box_header m-0">
                                            <div class="main-title">
                                                <h3 class="m-0">Profile Picture</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="white_card_body">
                                        <div class=" mb-0">
                                            <div class>
                                                <input type="file" name="profile_picture" id="profile_picture" class="form-control" placeholder="Upload Profile Picture" accept=".jpg, .jpeg, .png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                @if($user->profile_picture)
                                    <img src="{{ asset($user->profile_picture) }}"  alt="" height="auto" width="65%"/>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">First Name</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $user->first_name }}" required>
                                        @error('first_name')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Last Name</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $user->last_name }}" required>
                                        @error('last_name')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Email</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="text" class="form-control" placeholder="Enter your email" name="email" id="email" value="{{ $user->email }}" required>
                                        @error('email')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Mobile Number</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone" value="{{ $user->mobile }}" required>
                                        @error('mobile')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Date of Birth</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="date" class="form-control" name="dob" id="dob" value="{{ $user->dob }}" required>
                                        @error('dob')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Gender</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <select class="form-control" name="gender" id="gender">
                                            <option>Select Gender</option>
                                            <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                                            <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger ml-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Address</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <textarea class="form-control" name="address" id="address" placeholder="Enter teacher's address">{{ $user->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">New Password</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Confirm New Password</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class=" mb-0">
                                    <div class>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter new password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($user->role == 'teacher')
                        <div class="col-lg-3">
                            <a href="{{ route('teacher.details', ['id' => $user['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm" style="width: 80%;">
                                <i class="las la-edit">Reference Details</i>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('teacher.qualifications', ['id' => $user['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm" style="width: 80%;">
                                <i class="las la-edit">Qualifications</i>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('teacher.experiences', ['id' => $user['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm" style="width: 80%;">
                                <i class="las la-edit">Work Experience</i>
                            </a>
                        </div>
                        <div class="col-lg-1"></div>
                    @else
                        <div class="col-lg-10"></div>
                    @endif
                    <div class="col-lg-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-block" style="width: 100%;">Update Details</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('common.footer')
</section>
</body>

</html>
