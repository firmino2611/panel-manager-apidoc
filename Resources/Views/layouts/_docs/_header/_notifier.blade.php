<!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                @if(count(Auth::user()->unreadNotifications) > 0)
                    <span class="label label-warning">
                      {{ count(Auth::user()->unreadNotifications) }}
                    </span>
                @endif
              </a>
              <ul class="dropdown-menu">
                <li class="header">Voce nao possui {{ count(Auth::user()->unreadNotifications) }} notificacoes</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    @foreach(Auth::user()->unreadNotifications as $notify)
                      <li><!-- start notification -->
                          <a href="{{ route('user.notification.show', $notify->id) }}">
                              <i class="fa fa-circle text-aqua"></i> {{ $notify->data['title'] }}
                          </a>
                      </li>
                      <!-- end notification -->
                    @endforeach
                  </ul>
                </li>
                <li class="footer"><a href="#">Ver todas</a></li>
              </ul>
            </li>

            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Voce nao possui alertas</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>