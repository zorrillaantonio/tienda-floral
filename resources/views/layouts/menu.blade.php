<li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <p>Categorías</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('flower-arrangements.index') }}"
       class="nav-link {{ Request::is('flower-arrangements*') ? 'active' : '' }}">
        <p>Arreglos Florales</p>
    </a>
</li>


