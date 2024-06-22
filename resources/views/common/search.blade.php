<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area d-flex align-items-center">
{{--                    <div class="search_inner">--}}
{{--                        <form action="#">--}}
{{--                            <div class="search_field">--}}
{{--                                <input type="text" placeholder="Search here...">--}}
{{--                            </div>--}}
{{--                            <button type="submit"> <img src="{{ asset('temps/img/icon/icon_search.svg') }}" alt> </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>--}}
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="profile_info">
                        @php if(!empty(session()->get('profile_picture'))) {
                        @endphp
                            <img src="{{ asset(session()->get('profile_picture')) }}" alt="Profile Pic">
                        @php
                            }
                        @endphp
                        @php
                        if(empty(session()->get('profile_picture'))) {
                        @endphp
                            <i class="fa fa-user" aria-hidden="true"></i>
                        @php
                            }
                        @endphp

                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <p style="font-weight: bolder;font-size: 20px;">{{ session()->get('first_name') }} {{ session()->get('last_name') }}</p>
                                <p>{{ ucfirst(session()->get('role')) }} </p>
                            </div>
                            <div class="profile_info_details">
                                <a href="{{ route('profile') }}">My Profile </a>
{{--                                <a href="#">Settings</a>--}}
                                <a href="{{ route('logout-handler') }}">Log Out </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
