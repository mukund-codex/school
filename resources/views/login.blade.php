<!DOCTYPE html>
<html lang="en">
@include('common.header')

<body>

<section class="dashboard_part large_header_bg">

    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="row justify-content-center">
                                <div class="col-lg-6" style="text-align: center;">
                                    <div class="dashboard_header_title">
                                        <h3>Login</h3>
                                    </div>
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
                                    <div class="modal-header justify-content-center theme_bg_1">
                                        <h5 class="modal-title text_white">Log in</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('login-handler') }}">
                                            @csrf
                                            @include('common.form-alert')
                                            <div class>
                                                <input type="email" class="form-control" name="email" id="email"
                                                       placeholder="Enter your email" value="{{ old('email') }}">
                                                @error('email')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class>
                                                <label for="name"></label>
                                                <select class="form-control" name="role" id="name">
                                                    <option> Select your role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="teacher">Teacher</option>
                                                    <option value="librarian">Librarian</option>
                                                    <option value="parent">Parent</option>
                                                    <option value="student">Student</option>
                                                </select>
                                                @error('role')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class>
                                                <input type="password" class="form-control" placeholder="Password" name="password"
                                                id="password" value="{{ old('password') }}">
                                                @error('password')
                                                <span class="text-danger ml-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Log In.</button>

                                            <p>Need an account? <a data-bs-toggle="modal" data-bs-target="#sing_up"
                                                                   data-bs-dismiss="modal" href="{{ route('register') }}"> Sign Up</a></p>
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
