<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="logo-container">
        <a href="home"><img src="images/logos/logo-cm.svg" id="navbar__cm-home" alt="" /></a>
    </div>
    <button class="navbar-toggler navbar-toggler-right" type="button" 
        data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav ml-auto" id="exampleAccordion">
            <li class="nav-item navbar__border-right">
                <a class="nav-link nav-link-collapse collapsed underline-hover" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <i class="fa fa-users"></i>
                    <span class="nav-link-text">Usuarios</span>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li>
                        <a href="users_admin.user_add"  class="navbar-action underline-hover">Alta usuario</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-hover"  href="{{ url('logout') }}">
                    <i class="fa fa-fw fa-sign-out"></i>
                    <span class="nav-link-text">Cerrar sesión</span>
                </a>
            </li>
        </ul>
    </div>
</nav>