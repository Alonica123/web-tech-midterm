

<li class="nav-item">
    <a href="{{ route('boholInfos.index') }}"
       class="nav-link {{ Request::is('boholInfos*') ? 'active' : '' }}">
        <p>Bohol Infos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


