<?php

class HomeController extends BaseController {
    /*accesses home page
     * can add extra features like logins
     */
    function index() {
        $this->render_view('HomePage.php');
    }
}
?>
