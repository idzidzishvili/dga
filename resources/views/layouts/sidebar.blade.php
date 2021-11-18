<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{isset($pageid)&&$pageid==1?'active':''}}" href="/products">
                    Products <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{isset($pageid)&&$pageid==2?'active':''}}" href="/products/create">
                    Add product
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{isset($pageid)&&$pageid==3?'active':''}}" href="/requests">
                    Requests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{isset($pageid)&&$pageid==4?'active':''}}" href="/ipblacklist">
                    <span data-feather="layers"></span>
                    IP blacklist
                </a>
            </li>
        </ul>
    </div>
</nav>
