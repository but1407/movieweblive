<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1>
                    <a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Glance<span
                            class="dashboard_text">Design dashboard</span></a>
                </h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="{{ route('dasboard.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Category</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('category.create') }}"><i class="fa fa-angle-right"></i> Create</a>
                            </li>
                            {{-- <li>
                                <a href="media.html"><i class="fa fa-angle-right"></i> Media Css</a>
                            </li> --}}
                        </ul>
                    </li>
                    
                    <li class="treeview"></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Genre</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
    
                            <li>
                                <a href="{{ route('genre.create') }}">
                                    <i class="fa fa-angle-right"></i> Create</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('country.create') }}">
                            <i class="fa fa-th"></i> <span>Country</span>
                            <small class="label pull-right label-info">08</small>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Movie</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('movie.create') }}"><i class="fa fa-angle-right"></i> Movie Create</a>
                            </li>
                            <li>
                                <a href="{{ route('movie.index') }}"><i class="fa fa-angle-right"></i> Movie  List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Episodes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('episode.create') }}"><i class="fa fa-angle-right"></i> Episode Create</a>
                            </li>
                            <li>
                                <a href="{{ route('episode.index') }}"><i class="fa fa-angle-right"></i> Episode Index</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('episode.edit',[$]) }}"><i class="fa fa-angle-right"></i> Episode Edit</a>
                            </li> --}}
                        </ul>
                    </li>
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
</div>