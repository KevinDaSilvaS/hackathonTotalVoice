<?php

class RenderMenu
{
    public function __construct()
    {
        
    }

    public function renderMenu()
    {
        $menu = '
        <!-- BEGIN: SideNav-->
        <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded  blue-grey lighten-2 z-depth-1">
            <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" 
            data-collapsible="accordion">
                <li><a class="collapsible-body" href="Dashboard.php" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Dashboard</span></a>
                </li>
                <li><a class="collapsible-body" href="ListaFilhos.php" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Lista Filhos</span></a>
                </li>
                <li><a class="collapsible-body" href="ListaLocais.php" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Lista Locais</span></a>
                </li>
                <li><a class="collapsible-body" href="logout.php" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Log-Out</span></a>
                </li>
            </ul>
        <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
        href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
        </aside>
        <!-- END: SideNav-->
        ';

        return $menu;
    }
}

?>