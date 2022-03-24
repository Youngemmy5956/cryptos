<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{route('admin.home')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end">04</span>
                        <span key="t-dashboards">Overview</span>
                    </a>
                </li>

                <li class="menu-title" key="t-apps">Apps</li>
                <!-- <li>
                    <a href="{{route('admin.plans.index')}}" class="waves-effect">
                        <i class="dripicons-map"></i>
                        <span key="t-dashboards">My Wallet</span>
                    </a>
                </li> -->
                <li>
                    <a href="{{route('admin.currencies.index')}}" class="waves-effect">
                        <i class="fas fa-comment-dollar"></i>
                        <span key="t-dashboards">Currencies</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.subscriptions.index')}}" class="waves-effect">
                        <i class="fas fa-hourglass-start"></i>
                        <span key="t-dashboards">Subscriptions</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.plans.index')}}" class="waves-effect">
                        <i class="fas fa-praying-hands"></i>
                        <span key="t-dashboards">Available Plans</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users.index')}}" class="waves-effect">
                        <i class="fas fa-user-friends"></i>
                        <span key="t-dashboards">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.transactions.index')}}" class="waves-effect">
                        <i class="fab fa-cc-mastercard"></i>
                        <span key="t-dashboards">Users Transactions</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="{{route('admin.users.index')}}" class="waves-effect">
                        <i class="dripicons-map"></i>
                        <span key="t-dashboards">Users</span>
                    </a>
                </li> -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
