<?php
    class ProfileController extends SecureController {
        function index() {//temporary may need to add more may be fine for demonstration
            $this->render_view('Missions.php');
        }
    }