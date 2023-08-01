<div class="header">

    <div class="header-content">

        <nav class="navbar navbar-expand">

            <div class="collapse navbar-collapse justify-content-between">

                <div class="header-left">

                    <!-- <div class="search_bar dropdown">

                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">

                            <i class="mdi mdi-magnify"></i>

                        </span>

                        <div class="dropdown-menu p-0 m-0">

                            <form>

                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">

                            </form>

                        </div>

                        

                    </div> -->

                    <!-- <div class="col-sm-6 p-md-0"> -->

                        <div>

                        <div class="welcome-text">

                            <h4>Welcome {{Auth::user()->first_name.' '.Auth::user()->last_name}}!</h4>

                        </div>
                        

                    </div>
                </div>

                                   <body onload="startTime()">
                                        <p id="demo"></p>
                                    </body>


                <ul class="navbar-nav header-right">

                    <!-- <li class="nav-item dropdown notification_dropdown">

                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">

                            <i class="mdi mdi-bell"></i>

                            <div class="pulse-css"></div>

                        </a>

                    </li> -->

                    <li class="nav-item dropdown header-profile">

                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">

                            <i class="mdi mdi-account"></i>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right">

                             <a href="{{ route('profile.edit',Auth::user()->id)}}" class="dropdown-item">

                                <i class="icon-user"></i>

                                <span class="ml-2">My Profile </span>

                            </a>

                            <!-- <a href="./email-inbox.html" class="dropdown-item">

                                <i class="icon-envelope-open"></i>

                                <span class="ml-2">Inbox </span>

                            </a> -->

                            {{-- <a href="./page-login.html" class="dropdown-item">

                                <i class="icon-key"></i>

                                <span class="ml-2">Logout </span>

                            </a> --}}

                            <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                <i class="icon-key"></i>

                                <span class="ml-2">Logout </span>

                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>

                        </div>

                    </li>

                </ul>

            </div>

        </nav>

    </div>

</div>