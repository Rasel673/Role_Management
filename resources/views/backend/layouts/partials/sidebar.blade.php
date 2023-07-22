 @php 

 use function App\Helpers\canView;

 @endphp
 
 <!-- sidebar menu area start -->
 <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('backend/assets/images/icon/logo.png')}}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            @if(canView('role.view'))
                            <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('roles.create') || Route::is('roles.index') || Route::is('roles.edit') || Route::is('roles.show') ? 'in' : '' }}">
                            <li class="{{ Route::is('roles.index')  || Route::is('roles.edit') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">All Roles</a></li>
                            <li class="{{ Route::is('roles.create')  ? 'active' : '' }}"><a href="{{ route('roles.create') }}">Create Role</a></li>
                        </ul>
                    </li>
                    @endif

                    
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Users
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.users.create') || Route::is('admin.users.index') || Route::is('admin.users.edit') || Route::is('admin.users.show') ? 'in' : '' }}">
                            <li class="{{ Route::is('admin.users.index')  || Route::is('admin.users.edit') ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}">All Users</a></li>
                            <li class="{{ Route::is('admin.users.create')  ? 'active' : '' }}"><a href="{{ route('admin.users.create') }}">Create User</a></li>
                        </ul>
                    </li>




                    @if(canView('admin.view'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                        </ul>
                    </li>
                    @endif


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->