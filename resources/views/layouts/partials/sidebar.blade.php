<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse"
                    aria-expanded="false">
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
                    @php
                        $segment = Request::segment(1);
                    @endphp
                    <li class="treeview {{ $segment == 'category' ? 'active' : '' }}">
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
                    <li class="treeview {{ $segment == 'genre' ? 'active' : '' }}">
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
                    <li class="{{ $segment == 'country' ? 'active' : '' }}">
                        <a href="{{ route('country.create') }}">
                            <i class="fa fa-th"></i> <span>Country</span>
                            <small class="label pull-right label-info">08</small>
                        </a>
                    </li>
                    <li class="treeview {{ $segment == 'movie' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Movie</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('movie.create') }}"><i class="fa fa-angle-right"></i> Movie Create</a>
                            </li>
                            <li>
                                <a href="{{ route('movie.index') }}"><i class="fa fa-angle-right"></i> Movie List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview {{ $segment == 'episodes' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Episodes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('episode.create') }}"><i class="fa fa-angle-right"></i> Episode
                                    Create</a>
                            </li>
                            <li>
                                <a href="{{ route('episode.index') }}"><i class="fa fa-angle-right"></i> Episode
                                    Index</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('episode.edit',[$]) }}"><i class="fa fa-angle-right"></i> Episode Edit</a>
                            </li> --}}
                        </ul>
                    </li>
                    @if (Auth::check())
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="body_button">
                                @csrf
                                <button class="glow-on-hover" >Logout</button>
                            </form>
                            <style>
                                .glow-on-hover {
                                    width: 220px;
                                    height: 50px;
                                    border: none;
                                    outline: none;
                                    color: #fff;
                                    background: #111;
                                    cursor: pointer;
                                    position: relative;
                                    z-index: 0;
                                    border-radius: 10px;
                                }

                                .glow-on-hover:before {
                                    content: '';
                                    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
                                    position: absolute;
                                    top: -2px;
                                    left: -2px;
                                    background-size: 400%;
                                    z-index: -1;
                                    filter: blur(5px);
                                    width: calc(100% + 4px);
                                    height: calc(100% + 4px);
                                    animation: glowing 20s linear infinite;
                                    opacity: 0;
                                    transition: opacity .3s ease-in-out;
                                    border-radius: 10px;
                                }

                                .glow-on-hover:active {
                                    color: #000
                                }

                                .glow-on-hover:active:after {
                                    background: transparent;
                                }

                                .glow-on-hover:hover:before {
                                    opacity: 1;
                                }

                                .glow-on-hover:after {
                                    z-index: -1;
                                    content: '';
                                    position: absolute;
                                    width: 100%;
                                    height: 100%;
                                    background: #111;
                                    left: 0;
                                    top: 0;
                                    border-radius: 10px;
                                }

                                @keyframes glowing {
                                    0% {
                                        background-position: 0 0;
                                    }

                                    50% {
                                        background-position: 400% 0;
                                    }

                                    100% {
                                        background-position: 0 0;
                                    }
                                }
                            </style>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
</div>
