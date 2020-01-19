<?php 
class RenderFooter
{
    public function __construct()
    {
        
    }
    
    public function renderFooter()
    {
        $footer = '
        <!-- BEGIN: Footer-->

        <footer class="page-footer footer footer-static footer-light navbar-border navbar-shadow blue-grey lighten-5 z-depth-1">
          <div class="footer-copyright">
            <div class="container"></div>
          </div>
        </footer>
    
        <!-- END: Footer-->';

        return $footer;
    }
}

?>