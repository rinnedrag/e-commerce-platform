<nav id="sidebar" >
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
        <strong>Smiths</strong>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="{{url('/admin/products/list?page=1')}}">
                <i class="fas fa-home"></i>
                Товары
            </a>
        </li>
        <li>
            <a href="{{url('/admin/orders?page=1')}}">
                <i class="fas fa-briefcase"></i>
                Заказы
            </a>
        </li>
        <li>
            <a href="{{url('/admin/broadcast')}}">
                <i class="fas fa-video"></i>
                Видеочат
            </a>
        </li>
        {{--<li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i>
                Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>--}}
    </ul>

</nav>
