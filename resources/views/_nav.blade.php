<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">{{env('APP_NAME')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/status')}}">Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/faq')}}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('announcements')}}">Announcements</a>
                </li>
                <li class="nav-item">
                    @if(auth()->guest())
                        <a class="nav-link" href="{{url('/login')}}">Login</a>
                    @else
                        <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
