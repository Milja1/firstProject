<!-- вставка Sidebar для 'includ' в resources\views\admin\layouts\main.blade.php-->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                       {{ __('Категории')}}
                    </p>
                </a>
            </li>5
        </ul>
    </div>
</aside>