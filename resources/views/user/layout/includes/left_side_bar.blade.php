<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('user.home') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Overview</span>
                    </a>
                </li>

                <li class="menu-title" key="t-apps">Apps</li>
                <li>
                    <a href="{{route('user.myaccount.index')}}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dashboards">My Account</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.transactions.index')}}" class="waves-effect">
                        <i class="fab fa-cc-mastercard"></i>
                        <span key="t-dashboards">My Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.subscriptions.index')}}" class="waves-effect">
                        <i class="fas fa-won-sign"></i>
                        <span key="t-dashboards">Subscribe</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.wallets.index')}}" class="waves-effect">
                        <i class="fas fa-wallet"></i>
                        <span key="t-dashboards">My Wallet</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
