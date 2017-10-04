<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b>DA</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Manager Doc </b>Api</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                  @include('Apidoc::layouts._system._header._notifier')
                  
                  @include('Apidoc::layouts._system._header._user')

            </ul>
        </div>
    </nav>
</header>