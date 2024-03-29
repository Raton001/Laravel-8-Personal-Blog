        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">User</li>

                    <li class="nav-item">
                        <a href="{{route('userDashboard')}}" class="nav-link {{Route::currentRouteName()=='userDashboard' ? 'active' : ''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="{{route('userComments')}}" class="nav-link {{Route::currentRouteName()=='userComments' ? 'active' : ''}}">
                           <i class="icon icon-book-open"></i> Comments
                        </a>
                    </li>

                 @if (Auth::user()->author==true)
                
                    <li class="nav-title">Author</li>

                        <li class="nav-item">
                          <a href="{{route('authorDashboard')}}" class="nav-link {{Route::currentRouteName()=='authorDashboard' ? 'active' : ''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                          </a>
                       </li>
                        
                    <li class="nav-item nav-dropdown">
                        <a href="{{route('authorPost')}}" class="nav-link {{Route::currentRouteName()=='authorPost' ? 'active' : ''}}">
                           <i class="icon icon-paper-clip"></i> Posts
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="{{route('authorComments')}}" class="nav-link {{Route::currentRouteName()=='authorComments' ? 'active' : ''}}">
                           <i class="icon icon-book-open"></i> Comments
                        </a>
                    </li>
                @endif

                    @if (Auth::user()->admin==true)
                     <li class="nav-title">Admin</li>

                        <li class="nav-item">
                          <a href="{{route('adminDashboard')}}" class="nav-link {{Route::currentRouteName()=='adminDashboard' ? 'active' : ''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                          </a>
                       </li>
                        
                    <li class="nav-item nav-dropdown">
                        <a href="{{route('adminPosts')}}" class="nav-link {{Route::currentRouteName()=='adminPosts' ? 'active' : ''}}">
                           <i class="icon icon-paper-clip"></i> Posts
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="{{route('adminComments')}}" class="nav-link {{Route::currentRouteName()=='adminComments' ? 'active' : ''}}">
                           <i class="icon icon-book-open"></i> Comments
                        </a>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a href="{{route('adminUser')}}"  class="nav-link {{Route::currentRouteName()=='adminUser' ? 'active' : ''}}">
                           <i class="icon icon-user"></i> User
                        </a>
                    </li>
                @endif 
                </ul>
            </nav>
        </div>
       