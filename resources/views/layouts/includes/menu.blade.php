<ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Cadastro
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{!! route('admin.categorias.index') !!}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Categorias</p></a>
            </li>
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{!! route('admin.tipo_pagamentos.index') !!}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Tipos Pagamentos</p></a>
            </li>
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{!! route('admin.status.index') !!}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Estado do Pedido</p></a>
            </li>
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{!! route('admin.produtos.index') !!}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Produtos</p></a>
            </li>
        </ul>
    </li>
</ul>
