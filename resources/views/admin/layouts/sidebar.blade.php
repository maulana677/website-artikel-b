<div class="navbar-bg"></div>

{{--  navbar start  --}}
@include('admin.layouts.navbar')
{{--  navbar end  --}}

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Artikel FYP Media</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AFM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ setSidebarActive(['admin.dashboard']) }}">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">{{ __('admin.Starter') }}</li>


            <li class="{{ setSidebarActive(['categories.*']) }}">
                <a class="nav-link" href="{{ route('categories.index') }}"><i class="fas fa-list"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <li class="{{ setSidebarActive(['artikel.*']) }}">
                <a class="nav-link" href="{{ route('artikel.index') }}"><i class="fas fa-list"></i>
                    <span>Artikel</span>
                </a>
            </li>

            <li class="{{ setSidebarActive(['pendaftaran.*']) }}">
                <a class="nav-link" href="{{ route('pendaftaran.index') }}"><i class="fas fa-users"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>

            {{--  <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li>  --}}
        </ul>
    </aside>
</div>
