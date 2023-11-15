<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <div class="user-panel mt-2 pb-1 mb-2 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2">
        </div>
        <div class="info">
            <a href="#" class="d-block">StudTest</a>
        </div>
    </div>

    <div class="user-panel mt-2 pb-1 mb-2 d-flex mx-5">
        <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
    </div>

    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
    </ul>
</nav>

