<!-- Start Sidebar Menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
<!-- Start User Info-->
      <div class="app-sidebar__user">
        {{-- Get The User Image Form User Profile --}}
        <img class="app-sidebar__user-avatar" style=" width:48px; height:48px;" src="{{Auth::user()->profile->avatar_path}}" alt="{{Auth::user()->name}}">
        <div>
          <p class="app-sidebar__user-name">
             {{-- Get The User NickName Form User Profile --}}
            {{ Auth::user()->profile->nickname }}
          </p>
          <p class="app-sidebar__user-designation">
            {{-- Get The User Description Form User Profile --}}
            {{ Auth::user()->profile->description }}
          </p>
        </div>
      </div>
      <ul class="app-menu">
<!-- Start Dashboard  -->
        <li>
          <a class="app-menu__item" href="{{ Route('dashboard.index') }}">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">
              Dashboard
            </span>
          </a>
        </li>
<!-- Start Post  -->
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-sticky-note"></i>
            <span class="app-menu__label">Post</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{ Route('posts') }}">
                <i class="icon fa fa-circle-o"></i>
                Posts
              </a>
            </li>
            <li>
              <a class="treeview-item" href="{{ Route('post.create') }}">
                <i class="icon fa fa-circle-o"></i>
                Create
              </a>
            </li>
            <li>
              <a class="treeview-item" href="{{ Route('post.trash') }}">
                <i class="icon fa fa-circle-o"></i>
                Trash
              </a>
            </li>
          </ul>
        </li>
<!-- Start Category  -->
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-paperclip"></i>
            <span class="app-menu__label">Category</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{ Route('categories') }}">
                <i class="icon fa fa-circle-o"></i>
                Categories
              </a>
            </li>
            <li>
              <a class="treeview-item" href="{{ Route('category.create') }}">
                <i class="icon fa fa-circle-o"></i>
                Create
              </a>
            </li>
          </ul>
        </li>
<!-- Start Tag  -->
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-tags"></i>
            <span class="app-menu__label">Tag</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{ Route('tags') }}">
                <i class="icon fa fa-circle-o"></i>
                Tags
              </a>
            </li>
            <li>
              <a class="treeview-item" href="{{ Route('tag.create') }}">
                <i class="icon fa fa-circle-o"></i>
                Create
              </a>
            </li>
          </ul>
        </li>
<!-- Start Admin  -->
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-user"></i>
            <span class="app-menu__label">Admin</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{ Route('admins') }}">
                <i class="icon fa fa-circle-o"></i>
                Admins
              </a>
            </li>
            <li>
              <a class="treeview-item" href="{{ Route('admin.create') }}">
                <i class="icon fa fa-circle-o"></i>
                Create
              </a>
            </li>
          </ul>
        </li>
<!-- start Manage  -->
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">Manage</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{ Route('settings') }}">
                <i class="icon fa fa-circle-o"></i>
                Setting
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </aside>
<!-- End Sidebar Menu-->
