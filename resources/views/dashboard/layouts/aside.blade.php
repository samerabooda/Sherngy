<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-th"></i><span>@lang('admin.dashboard')</span></a></li>

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-"></i>
                    <span>@lang('admin.chat')</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('chat.index')}}"><i class="fa fa-circle-o"></i> @lang('admin.chat')</a></li>

                    <li><a href="{{route('chat.create')}}"><i class="fa fa-plus-square"></i> @lang('admin.addTOChat')</a></li>

                </ul>
            </li>
        </ul>

    </section>

</aside>

