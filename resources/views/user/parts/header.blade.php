<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper align-items-center flex-grow-1 d-none d-lg-flex">
            <ul class="navbar-nav nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        {{config('app.name')}}
                    </a>
                </li>
            </ul>
            @auth('user')
                <ul class="nav navbar-nav align-items-center ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

