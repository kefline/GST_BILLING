<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Kefline kichiba</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        >
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('admin.dashboard') }}" class="nav-link active" @if (Request::segment(2) == 'dashboard') active
                    
                @endif>
                    <i class="fa fa-dashboard active treeview"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            <li>
                <a href="{{route('admin.parties_Type.list')}}" class="nav-link active" @if (Request::segment(2) == 'parties_type') active
                    
                @endif>
                    <i class="fa fa-user nav-link active"></i> <span>Parties Type</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.parties.list')}}" class="nav-link active" @if (Request::segment(2) == 'parties') active
                    
                @endif>
                    <i class="fa fa-user nav-link active"></i> <span>Parties</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.GST_Bills.list')}}" class="nav-link active" @if (Request::segment(2) == 'gst_bills') active
                    
                @endif>
                    <i class="fa fa-user nav-link active"></i> <span>GST Bills</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.My_account.update')}}" class="nav-link active" @if (Request::segment(2) == 'my_account') active
                    
                @endif>
                    <i class="fa fa-user nav-link active"></i> <span>My Account</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
    </section>
</aside>