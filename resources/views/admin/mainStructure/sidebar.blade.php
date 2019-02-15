<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fa fa-home"></i>
            <span>{{ __('general.home') }}</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('general.category') }}</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('admin.addCategoryView') }}">{{ __('general.add') }}</a>
            <a class="dropdown-item" href="{{ route('admin.listCategoryView') }}">{{ __('general.list') }}</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-file"></i>
            <span>{{ __('general.post') }}</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('admin.addPostView') }}">{{ __('general.add') }}</a>
            <a class="dropdown-item" href="{{ route('admin.listPostView') }}">{{ __('general.list') }}</a>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.editSettingView') }}">
            <i class="fa fa-cogs"></i>
            <span>{{ __('general.settings') }}</span>
        </a>
    </li>

</ul>
<!-- Sidebar finish -->