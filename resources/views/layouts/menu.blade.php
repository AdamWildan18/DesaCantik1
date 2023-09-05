<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <label class="form-label switch_toggle d-none d-lg-block" for="checkbox">
                    <input type="checkbox" id="checkbox">
                    <div class="slider round open_miniSide"></div>
                </label>
                <img src="/img/desacantik.png" style="width: 300px">

                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="profile_info">
                        @auth
                        <h3><i class="bi bi-person-circle"></i></h3>
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <h4 style="color: aliceblue">{{ auth()->user()->name }}</h4>
                                    {{ auth()->user()->email }}
                                </div>
                                <div class="profile_info_details">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-in-right"></i> Logout
                                        </button>
                                    </form> 
                                </div>
                            </div>
                        @else
                        <a href="{{ route('indexlogin') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                            <h3><i class="bi bi-person-circle"></i></h3>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
