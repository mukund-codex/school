<!DOCTYPE html>
<html lang="en">

@include('common.header')

<body>

<section class="main_content dashboard_part large_header_bg">

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                    <h3>Register</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">

                                <div class="modal-content cs_modal">
                                    <div class="modal-header theme_bg_1 justify-content-center">
                                        <h5 class="modal-title text_white">Register</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('register-handler') }}" enctype="multipart/form-data">
                                            @csrf
                                            @include('common.form-alert')
                                            <div class>
                                                <label for="profile_picture">Profile Picture</label>
                                                <input type="file" name="profile_picture" id="profile_picture" class="form-control" placeholder="Upload Profile Picture" accept=".jpg, .jpeg, .png">
                                            </div>

                                            <div class>
                                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                                                @error('first_name')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class>
                                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                                @error('last_name')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class>
                                                <label for="name"></label>
                                                <select class="form-control" name="role" id="name" required>
                                                    <option> Select your role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="teacher">Teacher</option>
                                                    <option value="librarian">Librarian</option>
                                                    <option value="parent">Parent</option>
                                                </select>
                                                @error('role')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <br>


                                            <div class>
                                                <label for="email"></label>
                                                <input type="text" class="form-control" placeholder="Enter your email" name="email" id="email" value="{{ old('email') }}" required>
                                                @error('email')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class>
                                                <label for="mobile"></label>
                                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone" required>
                                                @error('mobile')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class>
                                                <label for="dob"></label>
                                                <input type="date" class="form-group" name="dob" id="dob" value="{{ old('dob') }}" required>
                                                @error('dob')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class>
                                                <label for="password"></label>
                                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="{{ old('password') }}" required>
                                                @error('password')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>

                                            <p>Need an account? <a data-bs-toggle="modal" data-bs-target="#sing_up"
                                                                   data-bs-dismiss="modal" href="{{ route('login') }}">Log in</a></p>
                                            <div class="text-center">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password"
                                                   data-bs-dismiss="modal" class="pass_forget_btn">Forget
                                                    Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('common.footer')
</section>


</body>
