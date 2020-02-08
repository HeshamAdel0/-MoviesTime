<!-- Start Upper Navbar-->
    <header class="app-header">
      <a class="app-header__logo" href="{{ Route('home') }}">
        @foreach( $settings as $setting)
          {{ $setting->website_name }}
        @endforeach
      </a>
<!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
<!-- Navbar Right Menu-->
      <ul class="app-nav">
<!--Notification Menu-->
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
              <i class="fa fa-bell-o fa-lg"></i>
            </a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li>
                <a class="app-notification__item" href="javascript:;">
                  <span class="app-notification__icon">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                  </span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div>
                </a>
              </li>
              <li>
                <a class="app-notification__item" href="javascript:;">
                  <span class="app-notification__icon">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i>
                    </span>
                  </span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div>
                </a>
              </li>
              <li>
                <a class="app-notification__item" href="javascript:;">
                  <span class="app-notification__icon">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x text-success"></i>
                      <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                    </span>
                  </span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div>
                </a>
              </li>
              <div class="app-notification__content">
                <li>
                  <a class="app-notification__item" href="javascript:;">
                    <span class="app-notification__icon">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                      </span>
                    </span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="app-notification__item" href="javascript:;">
                    <span class="app-notification__icon">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x text-danger"></i>
                        <i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i>
                      </span>
                    </span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="app-notification__item" href="javascript:;">
                    <span class="app-notification__icon">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x text-success"></i>
                        <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                      </span>
                    </span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div>
                  </a>
                </li>
              </div>
            </div>
            <li class="app-notification__footer">
              <a href="#">See all notifications.</a>
            </li>
          </ul>
        </li>
<!-- User Menu-->
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
            <i class="fa fa-user fa-lg"></i>
          </a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
<!-- Start Settings  -->
            <li>
              <a class="dropdown-item" href="{{ Route('settings') }}">
                <i class="fa fa-cog fa-lg"></i>
                Settings
              </a>
            </li>
<!-- Start Profile  -->
            <li>
              <a class="dropdown-item" href="{{
                Route('profile',['id'=>Auth::user()->id , 'name'=> ucwords(str_replace(' ', '-', Auth::user()->name))])}}">
                <i class="fa fa-user fa-lg"></i>
                Profile
              </a>
            </li>
<!-- Start Logout  -->
            <li>
              @guest
                <span></span>
              @else
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out fa-lg"></i>
                  {{ __('Logout') }}
                </a>
                <form 
                  id="logout-form" 
                  action="{{ route('logout') }}" 
                  method="POST" 
                  style="display: none;">
                  @csrf
                </form>
              @endguest
            </li>
<!-- End Logout  -->
          </ul>
        </li>
      </ul>
    </header>
<!-- End Upper Navbar -->
