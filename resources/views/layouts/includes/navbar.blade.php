                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @can('user-list')
                                <li><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                            @endcan
                            @can('role-list')
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                            @endcan
                            @can('permission-list')
                                <li><a class="nav-link" href="{{ route('permissions.index') }}">Permission</a></li>
                            @endcan
                            @can('post-list')
                                <li><a class="nav-link" href="{{ route('posts.index') }}">Posts</a></li>
                            @endcan
                            @can('snack-list')
                                <li><a class="nav-link" href="{{ route('snacks.index') }}">Snack</a></li>
                            @endcan
                                <li><a class="nav-link" href="{{ route('dropdownlist') }}">Dependent-Dropdown</a></li>
                                <li><a class="nav-link" href="{{ route('rates.index') }}">Train Rate</a></li>
                                <li><a class="nav-link" href="/javascripts">Javascript</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
