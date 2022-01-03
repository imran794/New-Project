<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                  <a class="dropdown-item" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <i class="material-icons">input</i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
                    <li class="{{ Request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }} ">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li> 
                     <li class="{{ Request()->is('admin/party*') ? 'active' : '' }}">
                        <a href="{{ route('admin.party.index') }} ">
                            <i class="material-icons">home</i>
                            <span>Party</span>
                        </a>
                    </li>

                    <li class="{{ Request()->is('admin/brand*') ? 'active' : '' }}">
                        <a href="{{ route('admin.brand.index') }} ">
                            <i class="material-icons">home</i>
                            <span>Brand</span>
                        </a>
                    </li> 

                     <li class="{{ Request()->is('admin/product*') ? 'active' : '' }}">
                        <a href="{{ route('admin.product.index') }} ">
                            <i class="material-icons">home</i>
                            <span>Product</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>