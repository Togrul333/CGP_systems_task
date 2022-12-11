<?php
    $action = app('request')->route()->getAction();
    $controller = class_basename($action['controller']);
    list($cn, $an) = explode('@', $controller);
    $cn = strtolower($cn);
    $size = strlen($cn) - strlen('controller');
    $cn = substr($cn, 0, $size);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar  flex-column nav-flat" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{ $cn == 'home' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a href="{{route('companies.index')}}" class="nav-link {{ $cn == 'company' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bold"></i>
                        <p>
                            Компании
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('clients.index')}}" class="nav-link {{ $cn == 'client' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bold"></i>
                        <p>
                            Клиенты
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
