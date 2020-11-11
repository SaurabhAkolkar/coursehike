<div class="la-header__nav la-header__nav d-flex flex-column justify-content-between">
    @if (Auth::check())

        <div class="la-header__nav-top d-md-inline-flex  align-items-center">
            <div class="la-header__nav-item d-md-none ">
                <a class="la-header__nav-link" href="/login">
                    <div class="la-header__profile-img">
                        <span class="icon-profile"></span>
                    </div>
                    <span class="la-header__nav-name">Nathan Spark</span>
                </a>
            </div>

            <div class="la-header__nav-item d-md-none ">
                <a class="la-header__nav-link" href="/user-dashboard">
                    <div class="la-header__nav-icon">
                        <span class="icon-profile"></span>
                    </div>
                    <span class="la-header__nav-name">Dashboard</span>
                </a>
            </div>

            <div class="la-header__nav-item">
                <a class="la-header__nav-link" href="/browse/courses">
                    <div class="la-header__nav-icon">
                    <span class="icon-help-filled"></span>
                    </div>
                    <span class="la-header__nav-name">Browse Courses</span>
                </a>
            </div>

            <div class="la-header__nav-item"> 
                <a class="la-header__nav-link" href="/my-courses">
                    <div class="la-header__nav-icon">
                    <span class="icon-all-mentors"></span>
                    </div> 
                    <span class="la-header__nav-name">My Courses</span>
                </a>
            </div>

            <div class="la-header__nav-item">   
                <a class="la-header__nav-link" href="/mentors">
                    <div class="la-header__nav-icon">
                    <span class="icon-learning-plans"></span>
                    </div>
                    <span class="la-header__nav-name">Mentors</span>
                </a>
            </div>

            <div class="la-header__nav-item d-md-none">   
                <a class="la-header__nav-link" href="/learning-plans">
                    <div class="la-header__nav-icon">
                    <span class="icon-about"></span>
                    </div>
                    <span class="la-header__nav-name">About LILA</span>
                </a>
            </div>
            
            <div class="la-header__nav-item d-md-none">   
                <a class="la-header__nav-link" href="/learning-plans">
                    <div class="la-header__nav-icon">
                    <span class="icon-contact"></span>
                    </div>
                    <span class="la-header__nav-name">Contact Us</span>
                </a>
            </div>
        </div>
    @else 
        <div class="la-header__nav-top d-md-inline-flex  align-items-center">
            <div class="la-header__nav-item d-md-none ">
                <a class="la-header__nav-link" href="/login">
                    <div class="la-header__nav-icon">
                        <span class="icon-profile"></span>
                    </div>
                    <span class="la-header__nav-name">Login</span>
                </a>
            </div>

            <div class="la-header__nav-item">
                <a class="la-header__nav-link" href="/courses">
                    <div class="la-header__nav-icon">
                    <span class="icon-help-filled"></span>
                    </div>
                    <span class="la-header__nav-name">Courses</span>
                </a>
            </div>

            <div class="la-header__nav-item"> 
                <a class="la-header__nav-link" href="/mentors">
                    <div class="la-header__nav-icon">
                    <span class="icon-all-mentors"></span>
                    </div> 
                    <span class="la-header__nav-name">Mentors</span>
                </a>
            </div>

            <div class="la-header__nav-item">   
                <a class="la-header__nav-link" href="/learning-plans">
                    <div class="la-header__nav-icon">
                    <span class="icon-learning-plans"></span>
                    </div>
                    <span class="la-header__nav-name">Learning Plans</span>
                </a>
            </div>

            <div class="la-header__nav-item d-md-none">   
                <a class="la-header__nav-link" href="/learning-plans">
                    <div class="la-header__nav-icon">
                    <span class="icon-about"></span>
                    </div>
                    <span class="la-header__nav-name">About LILA</span>
                </a>
            </div>
            
            <div class="la-header__nav-item d-md-none">   
                <a class="la-header__nav-link" href="/learning-plans">
                    <div class="la-header__nav-icon">
                    <span class="icon-contact"></span>
                    </div>
                    <span class="la-header__nav-name">Contact Us</span>
                </a>
            </div>
        </div>

        <div class="la-header__nav-bottom d-md-none">
            <div class="la-header__nav-item">   
                <a class="la-header__nav-link" href="/learning-plans">
                    <div class="la-header__nav-icon">
                        <span class="icon-help-filled"></span>
                    </div>
                    <span class="la-header__nav-name">Help</span>
                </a>
            </div>
        </div>
    @endif
    

</div>