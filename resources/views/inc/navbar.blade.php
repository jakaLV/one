
<nav class="navbar navbar-expand-md navbar-inverse navbar-laravel">
        <div class="container">
           
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <ul class="nav navbar-nav mr-auto">
                    @guest
                        <li><a href="/">@lang('messages.home')</a></li>
                        <li><a href="/about">@lang('messages.about')</a></li>
                        <li><a href="/sods">@lang('messages.fine')</a></li>
                    @elseif(Auth::user()->type=='Admin')
                        <li><a href="/">@lang('messages.home')</a></li>
                        <li><a href="/about">@lang('messages.about')</a></li>
                        <li><a href="/sods">@lang('messages.fine')</a></li>
                        <li><a href="/admin">@lang('messages.admin')</a></li>
                    @elseif(Auth::user()->type =='Regular')
                        <li><a href="/">@lang('messages.home')</a></li>
                        <li><a href="/about">@lang('messages.about')</a></li>
                        <li><a href="/sods">@lang('messages.fine')</a></li>
                    @endguest
                </ul>
                    
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                        <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Language
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href='/language/lv'>lv</a>
                                  <a class="dropdown-item" href='/language/en'>en</a>
                                </div>
                              </div>

                        

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                           <!--   <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>  -->
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span></a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>