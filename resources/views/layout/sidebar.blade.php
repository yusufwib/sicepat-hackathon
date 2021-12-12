        <!-- Side Header Start -->
        <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}"><a href="/dashboard"><i class="ti-layout-grid2-alt"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ (request()->is('courier')) ? 'active' : '' }}"><a href="/courier"><i class="fa fa-users"></i><span>Courier</span></a>
                        </li>
                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->
