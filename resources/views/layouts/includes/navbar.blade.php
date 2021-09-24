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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Roles
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @can('user-list')
                                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                                    @endcan
                                    @can('role-list')
                                        <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                                    @endcan
                                    @can('permission-list')
                                        <a class="nav-link" href="{{ route('permissions.index') }}">Permission</a>
                                    @endcan
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mailbox
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{ route('mailboxes.index') }}">Mailbox</a>
                                <a class="nav-link" href="/employees">Employee</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Campuran
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{ route('dropdownlist') }}">Dependent-Dropdown</a>
                                <a class="nav-link" href="{{ route('rates.index') }}">Train Rate</a>
                                <a class="nav-link" href="/javascripts">Javascript</a>
                                <a class="nav-link" href="{{ route('todos.index') }}">Todos</a>
                                <a class="nav-link" href="/duallistbox">Dual Listbox</a>
                                <a class="nav-link" href="/select2">Multiple Select</a>
                                <a class="nav-link" href="/departments">Populate Select</a>
                                <a class="nav-link" href="/employees">Select2 Employee</a>
                                </div>
                            </li>
                            @can('post-list')
                                <li><a class="nav-link" href="{{ route('posts.index') }}">Posts</a></li>
                            @endcan
                            @can('snack-list')
                                <li><a class="nav-link" href="{{ route('snacks.index') }}">Snack</a></li>
                            @endcan
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
