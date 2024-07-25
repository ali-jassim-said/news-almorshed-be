<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
       id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            <span class="ms-1 font-weight-bold">Morshed News</span>
        </a>
    </div>
    <hr class="horizontal dark mt-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{$page == 'posts' ? 'active' : ''}}" href="/cms">
                    <div class="{{$page == 'posts' ? 'text-light' : ''}} icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-blog"></i>
                    </div>
                    <span class="nav-link-text ms-1">Posts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$page == 'admins' ? 'active' : ''}}" href="/cms/admins">
                    <div class="{{$page == 'admins' ? 'text-light' : ''}} icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-gears"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admins</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
