<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('assets/backend/images/user.png')}}" width="48" height="48" alt="User"/>
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false">{{auth()->user()->name}}</div>
            <div class="email">{{auth()->user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>

                    <li role="separator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>

            @if(request()->is('admin/*'))
                <li class="{{request()->is('admin/dashboard' ) ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{request()->is('admin/tag' ) ? 'active' : ''}}">
                    <a href="{{route('admin.tag.index')}}">
                        <i class="material-icons">label</i>
                        <span>Tags</span>
                    </a>
                </li>

                <li class="{{request()->is('admin/category' ) ? 'active' : ''}}">
                    <a href="{{route('admin.category.index')}}">
                        <i class="material-icons">apps</i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="{{request()->is('admin/post' ) ? 'active' : ''}}">
                    <a href="{{route('admin.post.index')}}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>

                <li class="{{request()->is('admin/pending/posts' ) ? 'active' : ''}}">
                    <a href="{{route('admin.post.pending')}}">
                        <i class="material-icons">library_books</i>
                        <span>Pending Posts</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/subscriber') ? 'active' : '' }}">
                    <a href="{{ route('admin.subscriber.index') }}">
                        <i class="material-icons">subscriptions</i>
                        <span>Subscribers</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/favorite') ? 'active' : '' }}">
                    <a href="{{ route('admin.favorite.index') }}">
                        <i class="material-icons">favorite</i>
                        <span>Favorite Posts</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/comments') ? 'active' : '' }}">
                    <a href="{{ route('admin.comment.index') }}">
                        <i class="material-icons">comment</i>
                        <span>Comments</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/editors') ? 'active' : '' }}">
                    <a href="{{ route('admin.editor.index') }}">
                        <i class="material-icons">account_circle</i>
                        <span>Editors</span>
                    </a>
                </li>

                <li class="header">System</li>

                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif

            @if(request()->is('editor/*'))
                <li class="{{request()->is('editor/dashboard' ) ? 'active' : ''}}">
                    <a href="{{route('editor.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{request()->is('editor/post' ) ? 'active' : ''}}">
                    <a href="{{route('editor.post.index')}}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>

                <li class="{{ request()->is('editor/favorite') ? 'active' : '' }}">
                    <a href="{{ route('editor.favorite.index') }}">
                        <i class="material-icons">favorite</i>
                        <span>Favorite Posts</span>
                    </a>
                </li>

                <li class="{{ Request::is('editor/comments') ? 'active' : '' }}">
                    <a href="{{ route('editor.comment.index') }}">
                        <i class="material-icons">comment</i>
                        <span>Comments</span>
                    </a>
                </li>

                <li class="header">System</li>

                <li class="{{ Request::is('editor/settings') ? 'active' : '' }}">
                    <a href="{{ route('editor.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif


        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 <a href="javascript:void(0);">Youssef Ashraf</a>.
        </div>
    </div>
    <!-- #Footer -->
</aside>
