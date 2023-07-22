 <!-- page title area start -->
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">@yield('pagetitle')</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{asset('backend/assets/images/author/avatar.png')}}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth::guard('admin')->user()->name}}<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>

                                
                <!-- Authentication -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <a  class="dropdown-item" href="route('admin.logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
</a>
                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
