        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    
                    <!-- <li><a class="has-arrow no-icon" href="./Index.html" aria-expanded="false">
                        <i
                                class="icon icon-single-04"></i>
                        <span class="nav-text">Dashboard</span>
                               </a>
                    </li> -->

                    
                    <li><a class="has-arrow no-icon" href="{{ route('profile.edit',Auth::user()->id)}}" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Profile</span></a>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Client Management</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('client.create')}}">Add Clients</a></li>
                            <li><a href="{{ route('client.index') }}">View Clients</a></li>
                            
                        </ul>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Course Management</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('course.create')}}">Add Course</a></li>
                            <li><a href="{{ route('course.index') }}">View Course</a></li>
                            

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-plug"></i><span class="nav-text">Influencing Questions</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('attendee.index')}}">Attendee Questions</a></li>
                            <li><a href="{{ route('questions.index')}}">360 Questions</a></li>
                            
                        </ul>
                    </li>
                    
                    {{-- <li><a class="has-arrow" href="javascript:()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Leadership Questions</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./form-element.html">Attendee Questions</a></li>
                            <li><a href="./form-wizard.html">360 Questions</a></li>
                            
                        </ul>
                    </li> --}}
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Template Manager</span></a>
                        <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">Email Template</a></li>
                            <li><a href="ui-badge.html">Help Template</a></li>
                            <li><a href="table-datatable-basic.html">Common Template</a></li>
                            <li><a href="ui-button.html">Customize Messages</a></li>
                        </ul>
                    </li>

                    
                </ul>
            </div>


        </div>