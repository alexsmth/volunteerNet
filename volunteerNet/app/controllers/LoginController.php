<?php
    class LoginController extends SharedController {

        function index() {//temporary may need to add more may be fine for demonstration
            $this->render_view('Login.php');
        }
        function login() {
                var_dump($_GET);
            if (isset($_GET['submit'])) {
                $username = $_GET['username'];
                $password = $_GET['password'];
                setcookie('username', $username, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            }
	        $page_title = $this->view->page_title = "Home";
	        $this->render_view("HomePage.php");
        } 
    }
